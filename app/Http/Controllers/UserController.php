<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
//        $this->middleware('role:ROLE_ADMIN');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \App\Models\Order::all();
        $transactions= \App\Models\Transaction::all();

        return view('user.home',compact('orders', 'transactions'));

    }


    public function all_unpaid()
    {
        $orders = \App\Models\Order::where('payment_status',0)->get();
        return view('user.unpaid.list_all',compact('orders'));

    }

    public function unpaid($id){
        $order = \App\Models\Order::where('id',$id)->first();

        return view('user.unpaid.pay',compact('order'));
    }
}
