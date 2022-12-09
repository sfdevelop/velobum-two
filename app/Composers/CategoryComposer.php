<?php
namespace App\Composers;

use App\Category;
use Illuminate\View\View;

class CategoryComposer {
    private $categories;
    public function __construct() {
        $this->categories = Category::GetTree(null, 'categories_public');
    }

    public function compose(View $view) {
        $view->with([
            'categories' => $this->categories
        ]);
    }
}