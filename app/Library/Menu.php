<?php

namespace App\Library;

use App\Helpers\DataBuilder;
use App\Models\ApplicationMenus;
use App\Models\RolePermission;

class Menu {
    public static function load($application_id, $template, $menu_id = 0) {
        $rs_role_permissions = RolePermission::Auth()
            ->where('application_id', $application_id)
            ->get();
        $role_permissions = array();
        foreach ($rs_role_permissions as $r_role_permission) {
            $role_permissions[$r_role_permission->module_feature_id] = $r_role_permission->permission;
        }

        $rs_menus = ApplicationMenus::ViewNumberOfChild()
            ->where('application_id', $application_id)
            ->orderBy('sequence', 'asc')
            ->get();
        $menus = array();
        foreach ($rs_menus as $r_menu) {
            if ($r_menu->module_feature_id) {
                if (isset($role_permissions[$r_menu->module_feature_id])) {
                    $menus[] = $r_menu;
                }
            } else {
                $menus[] = $r_menu;
            }
        }
        $menus = DataBuilder::tree($menus, 'id', 'parent_id', $menu_id, true);
        return view($template, compact('menus'));
    }

    public static function set_menu($data, $parent_data, $id, $parent, $level = 0) {
        $result = array();
        foreach ($parent_data as $key => $row) {
            $row->tree_level = $level;
            $row->childs = array();
            if (isset($data[$row->$id])) {
                $row->childs = self::set_menu($data, $data[$row->$id], $id, $parent_data, $level + 1);
                unset($data[$row->$id]);
            }
            $result[] = $row;
        }
        return $result;
    }
}

?>
