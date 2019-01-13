<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create(){
        return view('user.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:2', 'max:255'],
            'address' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255', 'unique:users'],
            'password' => ['required','min:8','required_with:confirm_password','same:confirm_password'],
            'confirm_password' => ['required']
        ]);

        $user = new User();

        $user->name = request()->name;
        $user->address = request()->address;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);

        $user->save();

        return back()->with('success', 'Congratulations! Successfully registered.');
    }

    public function showLoginPage(){
        return view('user.login');
    }

    public function login(){
        if(Auth::attempt(request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]))){
            $session_value = Auth::user();
            request()->session()->put('user_id',$session_value->id);
            request()->session()->put('user_name',$session_value->name);
            return redirect('/book');
        }else{
            return back()->with('error', 'Sorry! Email or password does not match');
        }
    }

    public function show(User $user){
        $user = Auth::user();
        return view('user.show',compact('user'));
    }

    public function showMyBook(){
        $user = Auth::user();
        return view('/user/my-book')->with('user',$user);
    }

    public function destroy(User $user){
        $user->delete();
        request()->session()->flush();
        return redirect()->route('login');
    }

    public function logout()
    {
        request()->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }


}
