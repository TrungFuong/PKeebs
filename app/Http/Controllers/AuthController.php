<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function login(){
        $user = User::all();
        return view('auth.login', ['user' => $user]);
    }

    public function loginPost(Request $request){
        $credentials = $request->only('email','password');
        $check = Auth::attempt($credentials);
//        dd($request->all());
        if ($check){
            $email_account= User::where('email' ,'=', $request->email)->first();
            $request->session()->put('id', $email_account->id);
            $request->session()->put('username', $email_account->username);
            $request->session()->put('password', $email_account->password);
            $request->session()->put('isAdmin', $email_account->is_Admin);
            if($email_account->is_Admin === 0){
            return redirect('/admin/product/list');
        } else {
            return redirect('/home');
            }
        }
        return redirect('/auth/login')->with("fail", "Inavalid email/password");
    }

    public function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }

    public function register(Request $request)
    {
        $username = $request->username;
        $name = $request->name;
        $password = Hash::make($request->password);
        $email = $request->email;
        $is_Admin = $request->is_Admin;
        $phone = $request->phone;
        $address = $request->address;
        $isExist = User::select("*")
            ->where("username", $request->username)
            ->exists();

        if ($isExist) {
            return redirect()->back()->with('error', 'Username already exists.');
        } else {
            DB::table("user")->insert([
                'username' => $username,
                'name' => $name,
                'password' => $password,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'is_Admin' => $is_Admin
            ]);
            return redirect("/auth/login");
        }
    }
}
