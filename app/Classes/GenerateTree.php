<?php
namespace App\Classes;

class GenerateTree {
    private static $tree;

    private static function HandleGenerate($data, $sub) {
        $count = count($data);
        $i = 0;
        while ($i < $count) {
            if (count($data[$i]['child']) > 0) {
                self::$tree .= '
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  edgtf-has-sub">
                    <h4>
                        <span>'.$data[$i]['name'].'</span>
                    </h4>
                    <span class="mobile_arrow">
                        <i class="edgtf-sub-arrow fa fa-angle-right"></i>
                        <i class="fa fa-angle-down"></i>
                    </span>
                ';
                self::GenerateTree($data[$i]['child'], true);
            }
            else {
                self::$tree .= '
                <li class="menu-item menu-item-type-post_type menu-item-object-page ">
                    <a href="/items/category/'.$data[$i]['id'].'" class="">
                        <span>'.$data[$i]['name'].'</span>
                    </a>
                </li>
                ';
            }
            $i++;
        }
    }

    private static function GenerateTree($categories, $sub = false) {
        self::$tree .= '<ul class="sub_menu">';
        self::HandleGenerate($categories, $sub);
        self::$tree .= '</ul>';
        if ($sub) {
            self::$tree .= '</li>';
        }
    }
    public static function RunGenerateTree($categories){
        self::GenerateTree($categories);
        return self::$tree;
    }
}