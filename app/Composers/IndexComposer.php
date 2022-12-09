<?php
namespace App\Composers;

use App\Item;
use App\Service;
use Illuminate\View\View;

class IndexComposer {
    private $items;
    private $services;

    public function __construct() {
        $this->items = Item::GetItemForMainPage(6);
        $this->services = Service::GetLastThree();
    }

    public function compose(View $view) {
        $view->with([
            'items' => $this->items,
            'services' => $this->services,
        ]);
    }
}