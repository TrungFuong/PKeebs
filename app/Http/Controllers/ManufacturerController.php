<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function getAll()
    {
        $manufacturer = Manufacturer::all();
        return view('manufacturer.manufacturer_list', [
            "manufacturer" => $manufacturer
        ]);
    }

    public function add()
    {
        return view('manufacturer.manufacturer_add');
    }

    public function save(Request $request)
    {
        $manufacturer_name = $request->manufacturer_name;
        DB::table('manufacturer')->insert(
            ['manufacturer_name' => $manufacturer_name]
        );
        return redirect("/admin/manufacturer/list");
    }

    public function delete($id){
        try {
            DB::table("manufacturer")
                ->where("id", $id)
                ->delete();
        }
        catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                return redirect('/admin/category/list')->with('Error', 'Error!');
            } else {
                return redirect('/admin/category/list')->with('Error', 'Error!');
            }
        }
        return redirect("/admin/manufacturer/list");
    }

    public function edit($id){
        $manufacturer = DB::table('manufacturer')
            ->where('id', $id)
            ->first();
        return view('manufacturer.manufacturer_update',
            ["manufacturer" => $manufacturer]
        );
    }

    public function update(Request $request, $id){
        $manufacturer_name = $request->manufacturer_name;

        DB::table("manufacturer")
            ->where(["id" => $id])
            ->update([
                'manufacturer_name' => $manufacturer_name
            ]);
        return redirect('/admin/manufacturer/list');
    }

    public function view(){
        $manufacturer = Manufacturer::all();
        return view('customer.index', [
            "manufacturer" => $manufacturer
        ]);
    }

}
