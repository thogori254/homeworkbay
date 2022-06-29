<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class WriterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('writer.dashboard',compact('orders'));

    }

    public function orders_to_bid()
    {
        $orders = Order::where('payment_status',1)->where('completion_status',0)->get();

        return view('writer.bidding.bid_all',compact('orders'));

    }

    public function bid_order($id)
    {
        $order = Order::where('id',Crypt::decrypt($id))->firstOrFail();

        return view('writer.bidding.bid_order',compact('order'));

    }

    public function downloadFile($file)
    {

        $filePath = storage_path('app/public/upload/'.$file);
        if (! file_exists($filePath)) {
            return response('File not found',404);
        }

        return response()->download($filePath);
    }
}
