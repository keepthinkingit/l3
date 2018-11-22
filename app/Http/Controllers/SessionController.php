<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $result = $this->validate($request, [
            'email' => 'required|email|max:200',
            'password' => 'required'
        ]);

        $data = ['email' => $request->email,
                'password' => $request->password];
        if(Auth::attempt($data, $request->has('remember'))){
            session()->flash('success', ' Welcome back!');
            return redirect()->intended(route('users.show', [Auth::user()]));
        } else{
            session()->flash('danger', 'email or password input wrong , please check it !');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'You have logout , thanks ~');
        return redirect('login');
    }
}
