<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function getData(Request $request)
    {
        $user = Auth::user();

        if (! $user) {
            return response()->json('User not found! Something is not right!', 404);
        }
        try {
            User::destroy($user);

            return response()->json('SUCCESS', 200);
        } catch (\Exception $exception) {
            \Log::error('Could not retrieve user', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }
    }

    public function getUserOrders(Request $request)
    {
        $user = Auth::user();

        if (! $user) {
            return response()->json('User not found! Something is not right!', 404);
        } else {

        $orders = DB::select(" CALL `MerrPorositeKlientit`(?)", array($user->id));

        return view('user.layouts.profile', compact('orders'));
        }
    }
}
