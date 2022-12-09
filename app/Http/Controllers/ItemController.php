<?php

namespace App\Http\Controllers;

use App\Category;
use App\ImageItem;
use App\Item;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function Run() {
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => $_SERVER['SERVER_NAME'].' | Всі товари',
            'items' => Item::GetItems(),
        ];
        return view('items', ['page' => $data]);
    }
    public function RunItemsCategory($id) {
        $validator = Validator::make(
            ['id' => $id], ['id' => 'required|integer|exists:categories']
        );
        if ($validator->fails()) {
            return response($validator->messages());
        }
        $category_name = Category::GetItem($id)->name;
        $data = (object)[
            'title' => 'Товари | '.$category_name,
            'category_name' => $category_name,
            'route_name' => $this->route_name,
            'items' => Item::GetItems($id)
        ];
        return view('items', ['page' => $data]);
    }
    public function RunShare() {
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => $_SERVER['SERVER_NAME'].' | Акційні товари',
            'items' => Item::GetItems(null, true),
        ];
        return view('items', ['page' => $data]);
    }
    public function RunSearch() {
        $text_search = Input::get('text_search');
        $validator = Validator::make(
            ['text_search' => $text_search],
            ['text_search' => 'nullable|string',]
        );
        if ($validator->fails()) {
            return response($validator->messages());
        }
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => $_SERVER['SERVER_NAME'].' | Поиск '.$text_search,
            'text_search' => $text_search,
            'items' => Item::SearchItems(null, $text_search),
        ];
        return view('main', ['page' => $data]);
    }

    public function RunView($id) {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|int|exists:items,id']
        );
        if ($validator->fails()) {
            return response($validator->messages());
        }
        $item = Item::GetItem($id);
        $data = (object)[
            'title' => $_SERVER['SERVER_NAME'].' | '.$item->name,
            'images' => ImageItem::GetItemImages($id),
            'item' => $item,
        ];
        return view('view_item', ['page' => $data]);
    }
}
