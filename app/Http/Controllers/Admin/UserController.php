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
        $users = User::all();
        return view('admin.pages.user-list', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user-create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'string|required|max:255',
            'email' => 'required|email|unique:users',
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
            return redirect()->route('adminindex.users')->with('success', 'Successfully created User.');
        }
        else {
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        $roles = Role::all();

        if($user) {
            return view('admin.pages.user-edit', compact('user', 'roles'));
        }
        else {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);

        $this->validate($request, [
            'name' => 'string|required|max:255',
            'email' => 'email|required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'role_id' => 'required'
        ]);

        $status = false;

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        try {
            $status = $user->update($data);
        }
        catch(Exception $e) {
            return back()->with('exception', $e->getMessage());
        }

        if($status) {
            return redirect()->route('adminindex.users')->with('success', 'User successfully update.');
        }
        else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);

        if($user) {
            $status = $user->delete();
            if($status) {
                return redirect()->route('adminindex.users')->with('success', 'Successfully deleted user.');
            }
            else {
                return back()->with('error', 'Something went wrong! Please try again.');
            }
        }
        else {
            return back()->with('error', 'Data not found.');
        }
    }
}
