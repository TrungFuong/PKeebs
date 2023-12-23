<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAll()
    {
        $user = User::all();
        return view('user.user_list',
            [
                "user" => $user
            ]);
//        dd($user);
    }

    public function delete($id)
    {
        DB::table("user")
            ->where("id", $id)
            ->delete();
        return redirect("/admin/user/list");
    }

    public function add()
    {
        return view('user.user_add');
    }

    public function index(Request $request)
    {
        $isExist = User::select("*")
            ->where("username", $request->username)
            ->exists();
    }

    public function save(Request $request)
    {
        $username = $request->username;
        $password = Hash::make($request->password);
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $is_Admin = $request->is_Admin;

        $isExist = User::select("*")
            ->where("username", $request->username)
            ->exists();

        if ($isExist) {
            return redirect()->back()->with('error', 'Username already exists.');
        } else {
            DB::table("user")->insert([
                'username' => $username,
                'password' => $password,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'is_Admin' => $is_Admin
            ]);
            return redirect("/admin/user/list");
        }
    }

    public function edit($id)
    {
        $user = DB::table("user")
            ->where("id", $id)
            ->first();

        return view("user.user_update", [
            "user" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $isAdmin = $request->isAdmin;

        DB::table("user")
            ->where(["id" => $id])
            ->update([
                'username' => $username,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'isAdmin' => $isAdmin
            ]);
        return redirect("/admin/user/list");
    }
}
