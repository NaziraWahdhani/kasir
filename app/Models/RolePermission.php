<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $table = 'role_permissions';
    protected $primary_key = 'id';
    protected $fillable = ['role_id', 'application_id', 'module_feature_action_id', 'permission'];
    public $timestamps = false;

    public function scopeViewPermissions($query) {
        return $query->selectRaw('role_permissions.*, applications.application, modules.id as module_id, modules.module, module_features.feature, module_features.class')
            ->join('applications', 'applications.id', 'role_permissions.application_id')
            ->join('module_features', 'module_features.id', 'role_permissions.module_feature_id')
            ->join('modules', 'modules.id', 'module_features.module_id');
    }

    public function scopeAuth($query) {
        if (auth()->user()->role_id) {
            $result = $query->where('role_permissions.role_id', auth()->user()->role_id);
        } else {
            $result = $query->where('role_permissions.role_id', null);
        }
        return $result;
    }
}
