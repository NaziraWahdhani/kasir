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
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
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

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $roles = Roles::all();
        return view('pengaturan.data_user.edit', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
            'role_id' => 'required|exists:roles,id'
        ]);

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('pengaturan.data-user')->with('success', 'User berhasil diubah.');
    }

    public function delete($id)
    {
        $data = User::find($id);
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Barang tidak ditemukan'
            ]);
        }
        try {
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data'
            ]);
        }
    }
}
