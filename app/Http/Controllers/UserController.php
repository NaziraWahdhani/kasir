<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pengaturan.data_user.index');
    }

    public function create()
    {
        $roles = Roles::all();
        return view('pengaturan.data_user.create', compact('roles'));
    }
}
