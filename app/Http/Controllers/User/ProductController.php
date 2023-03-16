<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\Recipient;
use App\Models\Product\Product;
use App\Models\User\Role;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexListing(Request $request)
    {
        $category = Category::all();
        $recipient = Recipient::all();
        $key = $request->get('key');
        $recipientFilter = $request->get('recipient');
        $categoryFilter = $request->get('category');
        $priceFilter = $request->get('price');
        $orderFilter = $request->get('order');
        $query = Product::where('title', 'LIKE', '%' . $key . '%');
        if ($recipientFilter != null) {
            $recipientFilterId = Recipient::where("key", "LIKE", $recipientFilter)->first()->id;
            $query = $query->where('recipient_id', '=', $recipientFilterId);
        }
        if ($categoryFilter != null) {
            $categoryFilterId = Category::where("key", "LIKE", $categoryFilter)->first()->id;
            $query = $query->where('category_id', '=', $categoryFilterId);
        }
        if ($priceFilter != null) {
            $query = $query->whereRaw("price " . $priceFilter);
        }
        $query = $query->orderBy("price", $orderFilter ? $orderFilter : "ASC");
        $data = $query->paginate(12);
        return view("user.pages.products", [
            "data" => $data,
            "key" => $key,
            "category" => $category,
            "recipient" => $recipient,
            "recipientFilter" => $recipientFilter,
            "categoryFilter" => $categoryFilter,
            "priceFilter" => $priceFilter,
            "orderFilter" => $orderFilter
        ]);
    }
    public function indexCategory($categoryId)
    {
        $category = Category::all();
        $data = Product::where('category_id', $categoryId)->paginate(12);
        return view("user.pages.products", [
            "data" => $data,
            "category" => $category
        ]);
    }
    public function indexSingle($id)
    {
        $item = Product::where('id', $id)->first();
        return view("user.pages.single-product", [
            "item" => $item
        ]);
    }
}