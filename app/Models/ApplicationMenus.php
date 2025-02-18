<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApplicationMenus extends Model
{
    use HasFactory;
    protected $table = 'application_menus';
    protected $fillable = ['application_id', 'menu', 'description', 'modules_feature_action_id', 'url', 'icon', 'attributes', 'sequence', 'parent_id'];
    public $timestamps = false;

    public function scopeViewMenu($query) {
        return $query->selectRaw('application_menus.*, modules.module, module_features.feature, module_features.class')
        ->leftjoin('module_features', 'module_features.id', 'module_feature_actions.module_feature_id')
        ->leftjoin('modules', 'modules.id', 'module_features.module_id');
    }

    public function scopeViewNumberOfChild($query) {
        return $query->selectRaw('application_menus.*, (SELECT count(1) AS number_of_child FROM application_menus child_menus WHERE child_menus.parent_id = application_menus.id) as number_of_child');
    }

    public function scopeSequence($query, $parent_id) {
        $sequence = 1;
        $max = $query->selectRaw('MAX(sequence) AS sequence')
            ->where('parent_id', $parent_id)
            ->first();
        if ($max) {
            $sequence = $max->sequence + 1;
        }
        return $sequence;
    }
}
