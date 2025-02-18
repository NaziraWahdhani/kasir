<?php 

namespace App\Helpers;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class DataBuilder {
    public static function mapArray($data, $key, $value, $next = null) {
        $result = array();
        foreach ($data as $row) {        
            if (is_array($row)) {
                if ($next) {
                    $result[$next($row[$key])] = $next($row[$value]);
                } else {
                    $result[$row[$key]] = $row[$value];
                }
            } else {
                if ($next) {
                    $result[$next($row->{$key})] = $next($row->{$value});
                } else {
                    $result[$row->{$key}] = $row->{$value};
                }
            }
        }
        return $result;
    }

    public static function buildTree(array $elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    public static function array_flatten($array) { 
        if (!is_array($array)) { 
          return FALSE; 
        } 
        $result = array();
        foreach ($array as $key => $value) {
          if (isset($value['children'])) { 
            $result = array_merge($result, self::array_flatten($value['children']));
          } else { 
            $result[$key] = $value;
          }
        }
        return $result; 
      } 

      public static function lists($data, $value, $label, $placeholder = null, $placeholder_value = '') {
        $lists = array();
        if ($placeholder) {
            if ($placeholder === TRUE) {
                $placeholder = "select";
            }
            $lists[$placeholder_value] = $placeholder;
        }
        if (is_callable($data)) {
            $data = $data();
        }
        foreach ($data as $row) {
            $row = (Object) $row;
            if (is_callable($value)) {
                $value_data = $value($row);
            } else {            
                $value_data = $row->$value;
            }
    
            if (is_callable($label)) {
                $label_data = $label($row);
            } else {
                $label_data = $row->$label;
            }
            $lists[$value_data] = $label_data;
        }
        return $lists;
    }

    public static function tree($data, $id, $parent, $start = 0, $nested = false, $nested_index = 'childs')   {    
        $tree = array();
        $result = array();
        foreach ($data as $row) {
            $tree[$row->$parent][] = (Object) $row;
        }
        if (isset($tree[$start])) {
            if ($nested) {
                $result = self::set_tree_nested($tree, $tree[$start], $id, $parent, $nested_index);
            } else {
                $result = self::set_tree($tree, $tree[$start], $id, $parent);
            }
        }
        return $result;
    }

    public static function set_tree($data, $parent_data, $id, $parent, $level = 0) {
        $result = array();  
        foreach ($parent_data as $key => $row) {
            $row->tree_level = $level;
            $result[] = $row;               
            if (isset($data[$row->$id])) {              
                $result = array_merge($result, self::set_tree($data, $data[$row->$id], $id, $parent_data, $level + 1));
                unset($data[$row->$id]);
            }
        }   
        return $result;    
    }
    
    public static function set_tree_nested($data, $parent_data, $id, $parent, $nested_index, $level = 0) {
        $result = array();  
        foreach ($parent_data as $key => $row) {
            $row->tree_level = $level;                
            if (isset($data[$row->$id])) {              
                $row->$nested_index = self::set_tree_nested($data, $data[$row->$id], $id, $parent_data, $nested_index, $level + 1);
                unset($data[$row->$id]);
            }
            $result[] = $row;     
        }   
        return $result;    
    }
}