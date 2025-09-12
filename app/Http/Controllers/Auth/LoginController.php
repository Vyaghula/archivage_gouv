<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirection après login réussie
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect('/dashboard');
    }

    /**
     * Redirection après logout
     */
    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}
