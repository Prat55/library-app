<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
