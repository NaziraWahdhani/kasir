<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('pengaturan.user_roles.index', compact('roles'));
    }

    public function create()
    {
        return view('pengaturan.user_roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
            'description' => 'required|string'
        ]);

        Roles::create([
            'role' => $request->role,
            'description' => $request->description
        ]);

        return redirect()->route('pengaturan.user-roles');
    }
}
