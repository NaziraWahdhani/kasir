<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('role')->get();
        return view('pengaturan.data_user.index', compact('user'));
    }

    public function create()
    {
        $roles = Roles::all();
        return view('pengaturan.data_user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required|exists:roles,id'
        ]);

        $role = Roles::find($request->role_id);

        if (!$role) {
            return redirect()->back()->with('error', 'Role tidak ditemukan.');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id,
        ]);

        return redirect()->route('pengaturan.data-user')->with('success', 'User berhasil ditambahkan.');
    }
}
