<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        $data = [];
        $data['title'] = "Login Screen";

        return view('user/login', $data);
    }

    public function validateLogin(Request $request)
    {
        try {
            $user = User::where('email', $request->inputEmail)
                ->where('password', $request->inputPassword)
                ->first();

            if($user) {
                echo "Login successful!";
                $userDetails = $user->toArray();
                Debugbar::info($userDetails);
                // $_SESSION['userEmail'] = $userDetails['email'];
                // $_SESSION['loggedIn'] = true;
                Session::put('userEmail', $userDetails['email']);
                Session::put('loggedIn', true);
            } else {
                echo "Invalid email or password";
                Session::flush();
            }

        } catch(\Throwable $e) {
            session_destroy();
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        //
    }

    public function timeline(Request $request)
    {
        if(Session::get('loggedIn') === true) {
            $userEmail = Session::get('userEmail');
            echo "Timeline page of {$userEmail}";
        } else {
            echo "Invalid email or password";
        }
    }

    public function marketplace(Request $request)
    {
        print_r(Session::all());die;
        if(Session::get('loggedIn') === true) {
            $userEmail = Session::get('userEmail');
            echo "Marketplace page of {$userEmail}";
        } else {
            echo "Invalid email or password";
        }
    }

    public function profile(Request $request)
    {
        if(Session::get('loggedIn') === true) {
            $userEmail = Session::get('userEmail');
            echo "Profile page of {$userEmail}";
        } else {
            echo "Invalid email or password";
        }
    }
}
