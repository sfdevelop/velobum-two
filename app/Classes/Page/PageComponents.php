<?php
namespace App\PageComponents;
class PageComponents {
    public $component;

    public function Get($path) {
        switch ($path) {
            case 'admin':
                return $this->component = (object)[
                    'title' => null,
                    'domain' => $_SERVER['SERVER_NAME']
                ];
                break;
        }
    }
}