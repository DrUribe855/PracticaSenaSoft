<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
