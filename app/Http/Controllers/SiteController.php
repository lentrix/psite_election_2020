<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = auth()->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        if($user) {
            return redirect('/election');
        }else {
            return redirect()->back()
                ->with('Error','Invalid email and/or password.')
                ->with('email', $request['email']);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
