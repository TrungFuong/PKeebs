<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\search;


class CustomerShopController extends Controller{
    public function getAll(){
        {
            $product = Product::where('is_deleted', 1)
            ->paginate(12);
            $category = Category::all();
            $manufacturer = Manufacturer::all();
            Paginator::useBootstrap();
            return view('customer.shop', compact('product','category', 'manufacturer'))->with('i', (request()->input('page',1)-1)*10);
        }
    }

    public function kit(){
        $kit = Product::select('product.id as product_id', 'product.*')
            ->where('category_id', 1)
            -> where('is_deleted', 1)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->paginate(12);
        Paginator::useBootstrap();
        $category = Category::all();
        $manufacturer = Manufacturer::all();

        return view('customer.kit', compact('kit', 'category', 'manufacturer'))->with('i', (request()->input('page',1)-1)*10);
    }
    public function switch(){
        $switch = Product::select('product.id as product_id', 'product.*')
            ->where('category_id', 2)
            -> where('is_deleted', 1)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->paginate(12);
        Paginator::useBootstrap();

        $category = Category::all();
        $manufacturer = Manufacturer::all();

        return view('customer.switch', compact('switch', 'category', 'manufacturer'))->with('i', (request()->input('page',1)-1)*10);
    }
    public function keycap(){
        $keycap = Product::select('product.id as product_id', 'product.*')
            ->where('category_id', 3)
            -> where('is_deleted', 1)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->paginate(12);
        $category = Category::all();
        $manufacturer = Manufacturer::all();

        return view('customer.keycap', compact('keycap', 'category', 'manufacturer'))->with('i', (request()->input('page',1)-1)*10);
    }
    public function tools(){
        $tools = Product::select('product.id as product_id', 'product.*')
            ->where('category_id', 4)
            -> where('is_deleted', 1)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->paginate(12);
        Paginator::useBootstrap();

        $category = Category::all();
        $manufacturer = Manufacturer::all();

        return view('customer.tools', compact('tools', 'category', 'manufacturer'))->with('i', (request()->input('page',1)-1)*10);
    }

//    public function

    public function detail($id){
        $category = DB::table("category")
            -> get();
        $manufacturer = DB::table("manufacturer")
            ->get();
        $product = Product::with('category', 'manufacturer')->find($id);
//        dd($product);
        return view('customer.product_details', compact('id','product','category', 'manufacturer'));
    }

    public function cart(){
        $category = DB::table('category')
            ->get('*');
        if(session('shopping_cart')) {
            return view('customer.cart', compact('category'));
        } else {
            session()->flash('alert', 'Your cart is empty');
            return view('customer.cart', compact('category'));
        }
    }

    public function addToCart ($id){
        $item = DB::table('product')->find($id);

        $shopping_cart = session()->get('shopping_cart',[]);

        if (isset($shopping_cart[$id])){
            $shopping_cart[$id]['product_quantity']++;
        }
        else{
            $shopping_cart[$id] = [
                'id' => $item -> id,
                'product_name' => $item -> product_name,
                'product_price' => $item -> product_price,
                'product_image' => $item -> product_image,
                'product_quantity' => $item -> product_quantity,
                'quantity' => 1
            ];
        }
//        dd($shopping_cart);
        session()->put('shopping_cart', $shopping_cart);
//        dd($shopping_cart);
        return redirect('/home/cart')->with('success','added to cart!');
    }


    public function checkout(){
        $category = DB::table('category')->get('*');
        $user_id = session()->get('id');
        $user = DB::table('user')->where('id', $user_id)->get();
        if(session('shopping_cart')) {
            return view('customer.checkout', compact('category', 'user'));
        } else {
            return redirect('/home/cart')->with(['alert' => 'Your cart is empty']);
        }
    }


    public function place_order(Request $request){
        $name = $request -> customer_name;
        $address = $request -> customer_address;
        $phone = $request -> customer_phone;
        $create_at = now();
        $total = $request -> total;
        $cart = session()->get('shopping_cart', []);
        $user_id = session()->get('id');
        Orders::insert(
                [
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'created_at' => $create_at,
                    'status_id' => '1',
                    'user_id' => $user_id,
                    'total' => $total
                ]
            );
//dd($order);
        $order = Orders::where('user_id','=',$user_id)->orderBy('id', 'desc')->first();
        if ($order){
            $order_id = $order-> id;
        }
        foreach ($cart as $obj){
//            dd($obj);
        OrderDetail::insert(
          [
              'product_name' => $obj['product_name'],
              'product_price' => $obj['product_price'],
              'product_quantity' => $obj['product_quantity'],
              'product_image' => $obj['product_image'],
              'orders_id' => $order_id,
              'product_id' => $obj['id']
          ]
        );
            $quantity = DB::table('product')
                ->where('id', $obj['id'])
                ->value('product_quantity');

            $new_quantity = $quantity - $obj['quantity'];
//            dd($new_quantity);
        DB::table('product')
            ->where('id', $obj['id'],)
            ->update(['product_quantity' => $new_quantity]);
        }
        return redirect('/home/order/history')->with('success','order placed successfully');
    }

    public function order_history(){
        $category = DB::table('category')
            ->get('*');
        $user_id = session()->get('id');
        $order = Orders::where('user_id', $user_id)->get();
        return view('customer.order_history', compact('order', 'category'));
    }

    public function order_detail($id){
        $category = DB::table('category')
            ->get('*');
        $order = Orders::where('orders_id', $id)
            ->join('orders_detail','id','=','orders_detail.orders_id')
            ->get();
//        dd($order);
        return view('customer.order_detail', compact('order', 'category'));
    }

    public function order_cancel($id) {
        $order = Orders::where('id', $id)->first();
        if ($order && $order->status_id === 1) {
            Orders::where('id', $id)->update(['status_id' => 5]);
            return redirect('/home/order/history');
        } else {
            return redirect('/home/order/history')->with('error', 'Order cannot be canceled because it is not in "pending" status.');
        }
    }

    public function update_cart(Request $request)
    {
//        dd($request->all());
        $product_id = $request->product_id;
        $new_quantity = $request->product_quantity;
        if(session()->has('shopping_cart')) {
            $cart = session('shopping_cart');
            if(isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] = $new_quantity;
                session(['shopping_cart' => $cart]);
                session()->flash('success', 'Cart updated successfully');
            }
        }
        return redirect('/home/cart');
    }


    public function cart_remove($productId){
        $cartItems = session()->get('shopping_cart', []);
        foreach ($cartItems as $index => $item) {
            if ($item['id'] == $productId) {
                unset($cartItems[$index]);
                break;
            }
        }
        session()->put('shopping_cart', $cartItems);
        return redirect()->back();
    }
}
