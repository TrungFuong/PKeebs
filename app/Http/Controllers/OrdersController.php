<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller{
    public function getALl(){
        $orders = Orders::all();
        return view('orders.orders_list', compact('orders'));
}
  public function details($id){
      $order = Orders::where('orders_id', $id)
          ->join('orders_detail','id','=','orders_detail.orders_id')
          ->get();
//        dd($order);
      return view('orders.order_detail', compact('order'));
  }

    public function order_cancelled(){
        $orders = Orders::where('status_id', 5,)->get();
        return view('orders.order_cancelled', compact('orders'));
    }

    public function order_pending(){
        $orders = Orders::where('status_id',1)
            ->get();
        return view('orders.order_pending', compact('orders'));
    }
    public function order_confirmed(){
        $orders = Orders::where('status_id', 2)->get();
        return view('orders.order_confirmed', compact('orders'));
    }
    public function order_ship(){
        $orders = Orders::where('status_id', 7)->get();
        return view('orders.order_shipping', compact('orders'));
    }
    public function order_came(){
        $orders = Orders::where('status_id', 8)->get();
        return view('orders.order_shipped', compact('orders'));
    }

    public function order_completed(){
        $orders = Orders::where('status_id', 6)->get();
        return view('orders.order_done', compact('orders'));
    }


    public function order_cancel($id) {;
        Orders::where('id', $id)->update(['status_id' => 5]);
        return redirect('/admin/orders');
    }


    public function order_confirm($id) {;
            Orders::where('id', $id)->update(['status_id' => 2]);
            return redirect('/admin/orders');
    }

    public function order_shipping($id) {
        Orders::where('id', $id)->update(['status_id' => 7]);
        return redirect('/admin/orders');
    }

    public function order_shipped($id){
        Orders::where('id', $id)->update(['status_id' => 8]);
        return redirect('/admin/orders');
    }

    public function order_done($id){
        Orders::where('id', $id)->update(['status_id'=> 6]);
        return redirect('/admin/orders');
    }
}

