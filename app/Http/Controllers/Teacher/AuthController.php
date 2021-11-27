<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    protected $view = 'teacher.';
    protected $route = 'teacher.';
    protected $guard = 'teacher';

    public function __construct() {
        
    }
    
    public function loginForm() {
        return view($this->view.'login');
    }

    public function login(Request $request) {
        $payload = $request->only('username', 'password');

        if (Auth::guard($this->guard)->attempt($payload)) {
            return redirect()->route($this->route.'dashboard');
        } else {
            session()->flash('error', 'Username or password is wrong');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::guard($this->guard)->logout();
        return redirect()->route($this->route.'login');
    }
}
