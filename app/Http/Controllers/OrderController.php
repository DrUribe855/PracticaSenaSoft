<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller {
    
    public function index(){
        return view('Dispatcher/orders');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }

    public function generalShow(){
        $records = Order::with('store.order.order_product.product')->get();

        $data = [
                    'status' => true,
                    'order' => $records, 
                ];

        return response()->json( $data );
    }

}
