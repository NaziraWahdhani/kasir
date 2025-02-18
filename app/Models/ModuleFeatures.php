<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleFeatures extends Model
{
    use HasFactory;
    protected $table = 'module_features';
    protected $primary_key = 'id';
    protected $fillable = ['module_id','feature','class'];
    public $timestamps = false;

    public function scopeViewModuleFeature($query) {
        return $query->selectRaw('
                modules.id AS module_id,
                modules.module,
                applications.id AS application_id,
                applications.application,
                module_features.id AS module_feature_id,
                module_features.feature
            ')
            ->join('modules', 'modules.id', 'module_features.module_id')
            ->join('application_modules', 'application_modules.module_id', 'modules.id')
            ->join('applications', 'applications.id', 'application_modules.application_id');
    }
}
