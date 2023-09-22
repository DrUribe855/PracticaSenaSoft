<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Order;

class StoreController extends Controller {
    
    public function index(){
        return view('dispatcher/store');
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
        $records = Store::with('order.order_product.product')->get();


        $data = [
                    'status' => true,
                    'stores' => $records
                ];

        return response()->json( $data );
    }

}
