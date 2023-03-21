<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Exception;
use Illuminate\Http\Request;

class CategoriesMangementController extends Controller
{
    public function listAll()
    {
        $categories = Category::all();
        return view("admin.categories.list", ['categories' => $categories]);
    }
    public function create()
    {
        $categories = Category::all();
        return view("admin.categories.create", compact("categories"));
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:6",
            "key" => "required|string|min:0",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif"
        ], [
            "required" => "Vui lòng nhập thông tin",
            "string" => "Phải nhập vào là một chuỗi văn bản",
            "min" => "Phải nhập :attribute  tối thiểu :min",
            "mimes" => "Vui lòng nhập đúng định dạng ảnh"
        ]);
        try {
            $image = null;
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $fileName = time().$file->getClientOriginalName();
                $path = public_path("uploads");
                $file->move($path,$fileName);
                $image = "uploads/".$fileName;
            }
            Category::create([
                "title" => $request->get("title"),
                "key" => $request->get("key"),
                "image" => $image,
                "description" => $request->get("description"),

            ]);

            return redirect()->to("admin/categories/list")->with("success", "Create Categories success");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = Category::where('id', '=', $id)->first();
        return view("admin.categories.edit",['category'=> $category]);
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            "title" => "required|string|min:6",
            "key" => "required|string|min:0",
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif",
        ], [
            "required" => "Vui lòng nhập thông tin",
            "string" => "Phải nhập vào là một chuỗi văn bản",
            "min" => "Phải nhập :attribute tối thiểu :min",
            "mimes" => "Vui lòng nhập đúng định dạng ảnh"
        ]);


        $image = $category->image;
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path, $fileName);
            $image = "uploads/".$fileName;
        }

        $category->update([
            "title" => $request->get("title"),
            "key" => $request->get("key"),
            "image" => $image,
            "description" => $request->get("description"),
        ]);
        return redirect()->to("admin/categories/list");
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->to("admin/categories/list");
    }
}
