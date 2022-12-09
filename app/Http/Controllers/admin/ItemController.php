<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\ImageItem;
use App\Item;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;

class ItemController extends Controller {
    public function Run() {
        $data = (object)[
            'title' => 'Управление товарами',
            'route_name' => $this->route_name,
            'items' => Item::GetItemForMainPage(),
            'tree' => Category::GetTree(null, 'select_multiple')
        ];
        return view('admin.items.main', ['page' => $data]);
    }

    public function AddPage() {
        $data = (object)[
            'route_name' => $this->route_name,
            'tree' => Category::GetTree(null, 'add_or_update')
        ];
        return view('admin.items.work_on', ['page' => $data]);
    }

    public function SearchPage(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'categories.*' => 'nullable|integer|exists:categories,id',
            'data_start' => 'nullable|date',
            'data_end' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $items = Item::SearchItems($request);

        $data = (object)[
            'title' => 'Поиск по товарам',
            'route_name' => $this->route_name,
            'items' => $items,
        ];

        if ($request->has('categories')) {
            $tree = Category::GetTree($request->categories, 'select_multiple');
        }
        else {
            $tree = Category::GetTree(null, 'select_multiple');
        }
        $data->tree = $tree;

        if ($request->has('name')) {
            $data->old_name = $request->name;
        }
        if ($request->has('description')) {
            $data->old_description = $request->description;
        }
        if ($request->has('date_start')) {
            $data->old_date_start = $request->date_start;
        }
        if ($request->has('date_end')) {
            $data->old_date_end = $request->date_end;
        }
        if ($request->has('status')) {
            $data->old_status = $request->status;
        }
        return view('admin.items.main', ['page' => $data]);
    }

    public function RunEdit($id) {
        $item = Item::GetItem($id);
        $data = (object)[
            'tree' => Category::GetTree($item->category_id, 'add_or_update'),
            'all_item_images' => ImageItem::GetItemImages($id),
            'route_name' => $this->route_name,
            'item' => $item
        ];
        return view('admin.items.work_on', ['page' => $data]);
    }

    public function Add(Request $request) {
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean',
            'name' => 'required|string|min:1|max:255',
            'price' => 'between:0,99999999.99',
            'share_price' => 'between:0,99999999.99',
            'description' => 'required',
            'parent_id' => 'required|integer|exists:categories,id',
            'sorting_order' => 'integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if ($request->parent_id == 1) {
          return response()->json([
              'error' => 'Вы не выбрали категорию для товара'
          ]);
        }
        $share_price = null;
        if (isset($request->share_price)) {
            $share_price = $request->share_price;
        }
        if (Item::AddItem($request->name, $request->price, $request->description,
                          $request->parent_id, $share_price,
                          $request->sorting_order, $request->status)) {
            return response()->json([
                'status' => 'success',
                'item_id' => Item::GetLast()->id,
            ]);
        }
        else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function Edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|integer|exists:items,id',
            'status' => 'required|boolean',
            'name' => 'required|string|min:1|max:255',
            'price' => 'between:0,99999999.99',
            'share_price' => 'between:0,99999999.99',
            'description' => 'required',
            'parent_id' => 'required|integer|exists:categories,id',
            'sorting_order' => 'integer'
        ]);
        if ($request->parent_id == 1) {
          return response()->json([
              'error' => 'Вы не выбрали категорию для товара'
          ]);
        }
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $share_price = null;
        if (isset($request->share_price)) {
            $share_price = $request->share_price;
        }
        if (Item::UpdateItem($request->item_id, $request->name, $request->price,
                             $request->description,
                             $request->parent_id, $share_price,
                             $request->sorting_order, $request->status)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function EditMainImage(Request $request) {
        $validator = Validator::make($request->all(), [
            'item' => 'required|int|exists:items,id',
            'image' => 'required|int|exists:image_items,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $item = Item::GetItem($request->item);
        $image = ImageItem::GetItemImage($request->image);
        if ($item->image_name == $image->image_name) {
            return response()->json([
                'error' => 'Это изображения уже является главным изображением'
            ]);
        }
        ImageItem::ResetMain($request->item);
        ImageItem::MakeMain($request->image);
        $item->image_name = $image->image_name;
        $item->preview_image_name = $image->preview_image_name;
        if ($item->save()) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function Delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int|exists:items,id'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if (Item::ItemDelete($request->id)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }
}
