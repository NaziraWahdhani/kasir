<?php

namespace App\Http\Controllers;

use App\Models\ModuleFeatures;
use App\Models\RolePermission;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function permission($id) {
        $title = "Roles";
        $role = Roles::find($id);
        $permissions = [];
        $rs_application_features = ModuleFeatures::ViewModuleFeature()->get();
        foreach ($rs_application_features as $r_application_features) {
            $permissions[$r_application_features->application_id]['application_id'] = $r_application_features->application_id;
            $permissions[$r_application_features->application_id]['application'] = $r_application_features->application;
            $permissions[$r_application_features->application_id]['modules'][$r_application_features->module_id]['module_id'] = $r_application_features->module_id;
            $permissions[$r_application_features->application_id]['modules'][$r_application_features->module_id]['module'] = $r_application_features->module;
            $permissions[$r_application_features->application_id]['modules'][$r_application_features->module_id]['features'][$r_application_features->module_feature_id]['module_feature_id'] = $r_application_features->module_feature_id;
            $permissions[$r_application_features->application_id]['modules'][$r_application_features->module_id]['features'][$r_application_features->module_feature_id]['feature'] = $r_application_features->feature;
        }
        $rs_role_permissions = RolePermission::where('role_id', $id)->get();
        $model = array();
        foreach ($rs_role_permissions as $r_role_permission) {
            $model['permissions'][$r_role_permission->application_id][$r_role_permission->module_feature_id] = $r_role_permission->permission;
        }
        return view('pengaturan.user_roles.permission', compact('role', 'permissions', 'model', 'title'));
    }

    public function save($id) {
        $post = request()->all();
        $records = [];
        DB::beginTransaction();
        try {
            RolePermission::where('role_id', $id)->delete();
            if (isset($post['permissions'])) {
                foreach ($post['permissions'] as $application_id => $application) {
                    foreach ($application as $module_feature_id => $feature) {
                        $records[] = array(
                            'role_id' => $id,
                            'application_id' => $application_id,
                            'module_feature_id' => $module_feature_id,
                            'permission' => 1
                        );
                    }
                }
            }
            if (count($records) <> 0) {
                RolePermission::insert($records);
            }
            $response = [
                'success' => true,
                'status' => 200,
                'message' => 'Data berhasil disimpan'
            ];
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $response = [
                'success' => false,
                'status' => $e->getCode(),
                'message' => 'Data gagal disimpan',
                'error' => $e->getMessage()
            ];
        }
        if ($response['success']) {
            return redirect()->back()->with('success_message', $response['message']);
        } else {
            return redirect()->back()->with('error_message', $response['message']);
        }
    }

    public function edit($id)
    {
        $data = Roles::findOrFail($id);

        return view('pengaturan.user_roles.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Roles::findOrFail($id);

        $request->validate([
            'role' => 'required|string',
            'description' => 'required|string'
        ]);

        $data->update([
            'role' => $request->role,
            'description' => $request->description
        ]);

        return redirect()->route('pengaturan.user-roles');
    }

    public function delete($id)
    {
        $data = Roles::find($id);
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
