<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'inputTitle'=>'required',
            'al_options' => 'required',
            'TextareaInstructions' => 'required',
            'inputPaper' => '',
            'inputSubject' => '',
            'file' => '',
            'inputCitation'=> '',
            'spacing' => 'required',
            'inputDeadline' => '',
            'inputCurrency'=> '',
            'inputFieldnop' => '',
            'inputFieldnos' => '',
            'inputFieldnopps'=>'',
            'inputDeadlineDate'=>'',
            'writer_type_radio'=>'',
            'aggprice'=>'required',
        ]);

//        else{
//            return 'No';
//        }



        $order = new Order();
        $user = Auth::user();
        if ($request->hasFile('file')) {
            $filename = $user->id.$request->file->getClientOriginalName();
            $filesize = $request->file->getSize();
            $request->file->storeAs('public/upload',$filename);
//            $file = new File;
//            $file->name = $filename;
//            $file->size = $filesize;
//            $file->save();
//            $fileName = $request->image->store('public');
            $order->file = $filename;
        }
        $alevel = $request->al_options;
        $writer_options = $request->writer_type_radio;
        $order->title = $request->inputTitle;
        $order->ac_level  = $alevel;
        $order->instructions  = $request->TextareaInstructions;
        $order->paper_type  = $request->inputPaper;
        $order->subject  = $request->inputSubject;
        $order->citation  = $request->inputCitation;
        $order->spacing  = $request->spacing;
        $order->deadline  = $request->inputDeadline;

        $order->currency  = $request->inputCurrency;
        $order->number_of_pages  = $request->inputFieldnop;
        $order->number_of_sources  = $request->inputFieldnos;
        $order->number_of_powerpoints  = $request->inputFieldnopps;
        $order->writer_category  = $writer_options;
        $order->slug = $this->createSlug($request->inputTitle);
        $order->user_id = $user->id;
        $order->Total_price = $request->aggprice;


        $deadline_days = substr ($request->deadline, -3);
        if($deadline_days == "hrs"){
            $newdeadline = substr($request->deadline, 0, -3);
            $hours_to_add = (int)$newdeadline;
            $time = new DateTime($request->created_at);
            $time->modify("+{$hours_to_add} hours");

            $stamp = $time->format('Y-m-d H:i');
            $order->deadline_date = $stamp;
        }
        elseif($deadline_days == "ays"){
            $newdeadline = substr($request->deadline, 0, -4);
            $newdeadline2 = (int)$newdeadline * 24;
            $hours_to_add = $newdeadline2;
            $time = new DateTime($request->created_at);
            $time->modify("+{$hours_to_add} hours");

            $stamp = $time->format('Y-m-d H:i');
            $order->deadline_date = $stamp;
        }


        $order->save();

        $urlslug = $order->slug;

        $orders = \App\Models\Order::all();
        return redirect('/user/pay/'.$urlslug);
    }

    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Order::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
