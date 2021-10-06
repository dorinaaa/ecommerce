<?php

namespace App\Http\Controllers;

    use Auth;
    use App\User;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        public function index()
        {
            return response()->json(User::with(['orders'])->get());
        }

       

       /*  public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'phone'=>'required|regex:/(01)[0-9]{9}/',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'is_active'=>'required',
                'role_id'=>'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('bigStore')->accessToken,
            ]);
        } */

        public function show(User $user)
        {
            return response()->json($user);
        }

        public function showOrders(User $user)
        {
            return response()->json($user->orders()->with(['product'])->get());
        }

    }