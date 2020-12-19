<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('client.account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required',
            ]);
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $request->validate([
                'email' => 'required',
            ]);
            $user->email = $request->email;
        }
        if ($request->has('address')) {
            $request->validate([
                'address' => 'required',
            ]);
            $user->address = $request->address;
        }
        if ($request->has('phonenumber')) {
            $request->validate([
                'phonenumber' => 'required',
            ]);
            $user->phonenumber = $request->phonenumber;
        }
        if ($request->has('password')) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'The old password does not match our records.');
            }
        }
        $user->save();
        return redirect('/profile');
    }
}
