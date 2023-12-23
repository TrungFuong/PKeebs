<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getAll()
    {
        $category = Category::all();
        return view('category.category_list', [
            "category" => $category
        ]);
    }

    public function add()
    {
        return view("category.category_add");
    }

    public function save(Request $request)
    {
        $category_name = $request->category_name;
        DB::table('category')->insert(
            ['category_name' => $category_name]
        );
        return redirect("/admin/category/list");
    }

    public function delete($id)
    {
        try {
            DB::table("category")
                ->where("id", $id)
                ->delete();
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                return redirect('/admin/category/list')->with('Error', 'Error!');
            } else {
                return redirect('/admin/category/list')->with('Error', 'Error!');
            }
        }
        return redirect("/admin/category/list");
    }

    public function edit($id){
        $category = DB::table('category')
            ->where('id', $id)
            ->first();
        return view('category.category_update',
            ["category" => $category]
        );
    }

    public function update(Request $request, $id){
        $category_name = $request->category_name;

        DB::table("category")
            ->where(["id" => $id])
            ->update([
                'category_name' => $category_name
            ]);
        return redirect('/admin/category/list');
    }

    public function view() {
//        dd(1);
        $category = Category::all();
        return view('customer.index', compact('category'));
    }
}
