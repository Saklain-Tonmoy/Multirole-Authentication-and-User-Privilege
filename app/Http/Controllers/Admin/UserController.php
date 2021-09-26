<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user-create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'role_id' => 'required'
        ]);

        $status = false;

        try{
            $user = User::create($request->all());
            $user->password = Hash::make($request->password);
            $status = $user->save();


        } catch(Exception $e) {
            return back()->with('exception', $e->getMessage());
        }

        if($status) {
            return redirect()->route('adminsoftware.users')->with('success', 'Successfully created User.');
        } else {
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
