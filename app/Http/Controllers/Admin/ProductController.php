<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\Recipient;
use App\Models\Product\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order\Order;


class ProductController extends Controller
{
    public function listAll(Request $request)
    {
        $search = $request->get("search");
        $category_id = $request->get("category_id");
        $recipients_id = $request->get('recipients_id');

        $data =  Product::with("Category")
            ->Search($search)
            ->CategoryFilter($category_id)
            ->RecipientsFilter($recipients_id)
            ->orderBy("id", "desc")
            ->paginate(20);

        $categories = Category::all();
        $recipients = Recipient::all();
        return view("admin.product.list", [
            "data" => $data,
            "categories" => $categories,
            "recipients" => $recipients
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        $recipients = Recipient::all();

        return view("admin.product.create", ["categories"=>$categories,"recipients"=>$recipients]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:6",
            "price" => "required|numeric|min:0",
            "in_stock" => "required|numeric|min:0",
            "category_id" => "required",
            "recipients_id" => "required",
            "thumbnail" => "nullable|image|mimes:jpg,png,jpeg,gif"
        ], [
            "required" => "Vui lòng nhập thông tin",
            "string" => "Phải nhập vào là một chuỗi văn bản",
            "min" => "Phải nhập :attribute  tối thiểu :min",
            "mimes" => "Vui lòng nhập đúng định dạng ảnh"
        ]);
        try {
            $thumbnail = null;
            if ($request->hasFile("thumbnail")) {
                $file = $request->file("thumbnail");
                $fileName = time() . $file->getClientOriginalName();
                //            $ext = $file->getClientOriginalExtension();
                //            $fileName = time().".".$ext;
                $path = public_path("uploads");
                $file->move($path, $fileName);
                $thumbnail = "uploads/" . $fileName;
            }

            Product::create([
                "title" => $request->get("title"),
                "price" => $request->get("price"),
                "thumbnail" => $thumbnail,
                "description" => $request->get("description"),
                "in_stock" => $request->get("in_stock"),
                "category_id" => $request->get("category_id"),
                "recipients_id" => $request->get("recipients_id"),

            ]);

            return redirect()->to("admin/product/list")->with("success", "Thêm sản phẩm thành công");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        $recipients = Recipient::all();
        return view("admin.product.edit", compact("categories", 'product','recipients'));
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            "title" => "required|string|min:6",
            "price" => "required|numeric|min:0",
            "in_stock" => "required|numeric|min:0",
            "category_id" => "required",
            "recipients_id" => "required",

            "thumbnail" => "nullable|image|mimes:jpg,png,jpeg,gif",
        ], [
            "required" => "Vui lòng nhập thông tin",
            "string" => "Phải nhập vào là một chuỗi văn bản",
            "min" => "Phải nhập :attribute  tối thiểu :min",
            "mimes" => "Vui lòng nhập đúng định dạng ảnh"
        ]);

        $thumbnail = $product->thumbnail;
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            $fileName = time() . $file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path, $fileName);
            $thumbnail = "uploads/" . $fileName;
        }

        $product->update([
            "title" => $request->get("title"),
            "price" => $request->get("price"),
            "thumbnail" => $thumbnail,
            "description" => $request->get("description"),
            "in_stock" => $request->get("in_stock"),
            "category_id" => $request->get("category_id"),
            "recipients_id" => $request->get("recipients_id"),

        ]);
        return redirect()->to("admin/product/list");
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->to("admin/product/list");
    }


}
