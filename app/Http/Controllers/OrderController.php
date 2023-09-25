<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\OrderProduct;

class OrderController extends Controller {
    
    public function index(){
        return view('Dispatcher/orders');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $order = new Order();
        $order->store_id = $request->input('store_id');
        $order->total = $request->input('total');
        $order->save();

        $order_id = $order->getKey();

        $order_product = new OrderProduct();
        $order_product->order_id = $order_id;
        $order_product->product_id = $request->input('product_id');
        $order_product->quantity = $request->input('amount');
        $order_product->save();

        $records = Order::with('store.order.order_product.product')->get();

        $data = [
            'status' => true,
            'order' => $order,
            'order_product' => $order_product,
            'order_list' => $records
        ];

        return response()->json($data);
    }

    public function show($id){
        //
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){

        $records = Order::find($id);
        $records->status = $request->input('status');
        $records->save();

        $store = Store::with('order.order_product.product')->find( $records->store_id );

        $data = [
                    'status' => true,
                    'order' => $records,
                    'store' => $store,
                ];

        return response()->json( $data );
    }

    public function destroy($id){
        //
    }

    public function generalShow(){
        $records = Order::with('store.order.order_product.product')->get();
        $products = Product::all();
        $store = Store::all();
        $data = [
                    'status' => true,
                    'order' => $records,
                    'product' => $products, 
                    'store' => $store,
                ];

        return response()->json( $data );
    }

}
