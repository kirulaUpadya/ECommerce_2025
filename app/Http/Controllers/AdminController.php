<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $category = Category::find($id);

        return view('admin.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);

        $category->category_name = $request->category;

        $category->save();

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->quantity = $request->qty;

        $product->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(2);

        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();

        $image_path = public_path('products/' . $product->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        return redirect()->back();
    }

    public function update_product($id)
    {
        $product = Product::find($id);

        $category = Category::all();

        return view('admin.update_page', compact('product', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title', 'like', '%' . $search . '%')->orWhere('category', 'like', '%' . $search . '%')->paginate(2);

        return view('admin.view_product', compact('product'));
    }
}
