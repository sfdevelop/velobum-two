<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller {
    public function Run() {
        return view('admin.categories.main', ['categories' => Category::GetTree(1, 'categories/main')]);
    }

    public function AddPage() {
        $data = (object)[
            'title' => 'Добавление категории',
            'route_name' => $this->route_name,
            'parents' => Category::GetTree(1, 'add_or_update')
        ];
        return view('admin.categories.work_on', ['page' => $data]);
    }

    public function UpdatePage($id) {
        if ($id == 1) {
            return redirect()->route('categories/main')->with('error', 'Эта категория используется чтобы определить родительские категории. Ее изменить нельзя.');
        }
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:categories,id']
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $category = Category::GetItem($id);
        $data = (object)[
            'title' => 'Изменение категории',
            'route_name' => $this->route_name,
            'category' => $category,
            'item_id' => $id,
            'parents' => Category::GetTree($category->parent_id, 'add_or_update')
        ];
        return view('admin.categories.work_on', ['page' => $data]);
    }

    public function Add(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:500',
            'parent_id' => 'required|integer|exists:categories,id',
            'sorting_order' => 'integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $id = Category::CreateItem($request->name, $request->parent_id, $request->sorting_order);
        return response()->json([
            'status' => 'success',
            'item_id' => $id
        ]);
    }

    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:500',
            'parent_id' => 'required|integer|exists:categories,id',
            'sorting_order' => 'integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }

        if ($request->item_id == $request->parent_id) {
            return response()->json([
                'error' => 'Категория не может быть сама себе родительской категорией'
            ]);
        }
        Category::UpdateItem($request->item_id, $request->name, $request->parent_id, $request->sorting_order);
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function Delete($id) {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:categories,id']
        );
        if ($validator->fails()) {
            return redirect()->route('categories/main')->withErrors($validator);
        }
        if (Category::CallDeleteItem($id)) {
            $message = 'Категория и все ее подкатегории удалены';
            return redirect()->route('categories/main')->with('success', $message);
        }
    }
}