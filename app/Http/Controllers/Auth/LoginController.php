<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    use ThrottlesLogins;
    protected $maxAttempts = 2;
    protected $decayMinutes = 5;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('auth.login');
    }
    public function show_unlock_form()
    {
        return view('auth.unlock');
    }

    public function process_unlock(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:5'
        ]);
        $user = User::where('email',$request->email)->first();

        if ($user->unlock_code == $request->code) {
            $user->blocked = 0;
            $user->save();
        }

        session()->flash('success', 'Your account is unlocked');

        return redirect()->route('show.login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();

        if ($user->blocked) {
            session()->flash('blocked', 'To many login attempts. Your account is locked and you cant login. We\'ve sent you an email with an unblocking code.');
            return redirect()->back();
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $code = rand(pow(10, 4), pow(10, 4)-1);
            $user->blocked = 1;
            $user->unlock_code = $code;
            $user->save();
            $this->sendEmail($user->email, $code);
            session()->flash('blocked', 'To many login attempts. We\'ve sent you an email with an unlocking code.');
            return redirect()->back();
        }

        if (auth()->attempt($credentials)) {

            $this->clearLoginAttempts($request);
            if ($user->canAccessAdminPanel()) {
                return redirect()->route('admin');
            }
            return redirect('/');

        }else{
            $this->incrementLoginAttempts($request);
            session()->flash('failed', 'Invalid credentials');
            return redirect()->back();
        }
    }
    public function show_signup_form()
    {
        return view('auth.register');
    }
    public function process_signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check if exists first
        $user = User::create([
            'first_name' => trim($request->input('first_name')),
            'last_name' => trim($request->input('last_name')),
            'email' => strtolower($request->input('email')),
            'phone' => 000,
            'password' => bcrypt($request->input('password')),
            'is_active' => '1',
            'role_id' => '2'
        ]);

        session()->flash('success', 'Your account is created');

        return redirect()->route('show.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    private function sendEmail($email, $code)
    {
        Mail::send([], [], function ($message) use ($email, $code) {
            $text = 'Hi, please unlock your account by visiting the following link and filling the form with your unlock code.' .PHP_EOL.
                'LINK: ' . route('show.unlock'). PHP_EOL .
                'CODE: ' . $code . '';
            $message->to($email)
                ->from('kepler@shop.com')
                ->subject('Unlock your account')
                ->setBody($text);
        });
    }

    public function username()
    {
        return 'email';
    }
}
