<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;

class OrderController extends Controller {
    
    public function index(){
        return view('Dispatcher/orders');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        return $request;
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
