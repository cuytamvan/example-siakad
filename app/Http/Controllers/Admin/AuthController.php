<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    protected $view = 'admin.';
    protected $route = 'admin.';

    public function __construct() {
        
    }
    
    public function loginForm() {
        return view($this->view.'login');
    }

    public function login(Request $request) {
        $payload = $request->only('username', 'password');

        if (Auth::attempt($payload)) {
            return redirect()->route($this->route.'dashboard');
        } else {
            session()->flash('error', 'Username or password is wrong');
            return redirect()->back();
        }
    }
}
