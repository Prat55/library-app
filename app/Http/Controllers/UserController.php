<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function students()
    {
        return view("backend.user-management.students");
    }

    protected function teachers()
    {
        return view("backend.user-management.teachers");
    }

    protected function admins()
    {
        return view("backend.user-management.admins");
    }

    protected function new_user()
    {
        return view("backend.user-management.new-user", [
            'faculties' => Faculty::all()
        ]);
    }

    protected function add_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:198',
            'faculty' => 'required',
            'phone' => 'nullable|max_digits:10|min_digits:10|numeric',
            'password' => 'required|max:16|min:8',
            'role' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->faculty_id = $request->faculty;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();

            return redirect()->route('new_user')->with('success', 'User added successfully');
        } else {
            return redirect()->back()
                ->withErrors($validator);
        }
    }
}
