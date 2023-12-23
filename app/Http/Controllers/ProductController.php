<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller

{
    public function getAll()
    {
        $product = Product::where('is_deleted', 1)
            ->get();
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('product.product_list', compact('product','category', 'manufacturer'));
    }

    public function delete($id)
    {
        Product::where("id", $id)->update(['is_deleted' => 0]);

        return redirect("/admin/product/list");
    }

    public function restore($id)
    {
        Product::where("id", $id)->update(['is_deleted' => 1]);

        return redirect("/admin/product/list");
    }

    public function deletePermanent($id)
    {
        Product::where("id", $id)
            ->delete();
        return redirect("/admin/product/list");
    }

    public function trash()
    {
        $product = Product::where('is_deleted', 0)
            ->get();
        $category = Category::all();
        $manufacturer = Manufacturer::all();
//        dd($product);
        return view('product.trash', compact('product','category', 'manufacturer'));
//        return "abc";
    }

    public function add()
    {
        $category = DB::table("category")
        -> get();
        $manufacturer = DB::table("manufacturer")
        ->get();
        return view("product.product_add",
        [
            'category'=>$category,
            'manufacturer'=>$manufacturer
        ]
        );
    }

    public function save(Request $request)
    {
        $product_name = $request->product_name;
        $product_quantity = $request->product_quantity;
        $product_price = $request->product_price;
        $product_description = $request->product_description;
        $product_image = time() . '_' . $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path('image'), $product_image);
        $category_id = $request->category_id;
        $manufacturer_id = $request->manufacturer_id;

        DB::table("product")->insert([
            'product_name' => $product_name,
            'product_quantity' => $product_quantity,
            'product_price' => $product_price,
            'product_description' => $product_description,
            'product_image' => $product_image,
            'category_id' => $category_id,
            'manufacturer_id' => $manufacturer_id
        ]);


        return redirect("/admin/product/list");
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('product_name', 'like', '%'.$search.'%')
            ->get();

        return view('products.index', ['products' => $products]);
    }

    public function edit($id)
    {
        $category = DB::table("category")
            -> get();
        $manufacturer = DB::table("manufacturer")
            ->get();
        $product = DB::table("product")
            ->where("id", $id)
            ->first();

        return view("product.product_update", [
            "product" => $product,
            "category" => $category,
            "manufacturer" => $manufacturer
        ]);
    }

    public function update(Request $request, $id)
    {
        $product_name = $request->product_name;
        $product_quantity = $request->product_quantity;
        $product_price = $request->product_price;
        $product_description = $request->product_description;
        $product_image = time() . '_' . $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path('image'), $product_image);
        $category_id = $request->category_id;
        $manufacturer_id = $request->manufacturer_id;

        DB::table("product")
            ->where(["id" => $id])
            ->update([
            'product_name' => $product_name,
            'product_quantity' => $product_quantity,
            'product_price' => $product_price,
            'product_description' => $product_description,
                'product_image' => $product_image,
            'category_id' => $category_id,
            'manufacturer_id' => $manufacturer_id
        ]);
        return redirect("/admin/product/list");
    }

    public function detail($id){
        $category = DB::table("category")
            -> get();
        $manufacturer = DB::table("manufacturer")
            ->get();
        $product = DB::table("product")
            ->where("id", $id)
            ->get();
        return view("product.product_detail",
            [
            "product" => $product,
            "category" => $category,
            "manufacturer" => $manufacturer
        ]
        );
//        dd($product);
    }


}
