<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use URL;
//use Session;
use Redirect;
use Input;
/** All Paypal Details class **/
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $clientId = $paypal_conf['client_id'];
        $clientSecret = $paypal_conf['secret'];
    }
    /**
     * This is the page where you have to display your payment page
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal($slug)
    {
        $user = Auth::user();
        $order = \App\Models\Order::where('slug',$slug)->where('user_id',$user->id)->firstOrFail();

        return view('user.unpaid.pay',compact('order'));
        // Paste smart button code in this view
    }
    /**
     * Your business logic will come here
     * Order will be created in this function and then paypal window will open for authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        if(Session::has('orderModelData'))
            $orderModelData = Session::get('orderModelData');


            $order = \App\Models\Order::where('id',$orderModelData->id)->first();
            $currency =Str::upper($order->currency);
            $amount = $order->Total_price;
            $paypal_conf = \Config::get('paypal');
            $clientId = $paypal_conf['client_id'];
            $clientSecret = $paypal_conf['secret'];
            $environment = new SandboxEnvironment($clientId, $clientSecret);
            $client = new PayPalHttpClient($environment);
            $request = new OrdersCreateRequest();
            $request->prefer('return=representation');
            $request->body = [
                "intent" => "CAPTURE",
                "purchase_units" => [[
                    "reference_id" => $order->id.$order->user_id,
                    "amount" => [
                        "value" =>  $this->convertAmount($currency,$amount),
                        "currency_code" => 'USD'
                        //put other details here as well related to your order
                    ]
                ]],
                "application_context" => [
                    "cancel_url" => "http://127.0.0.1:8000/paypalreturn",
                    "return_url" => "http://127.0.0.1:8000/paypalcancel"
                ]
            ];
            try {
                // Call API with your client and get a response for your call
                $response = $client->execute($request);

                // If call returns body in response, you can get the deserialized version from the result attribute of the response
                echo json_encode($response); die;
            }catch (HttpException $ex) {
                echo $ex->statusCode;

                //echo json_encode($ex->getMessage());
            }
    }
    /**
     * After successful paypal authentication from paypal window, paypal will call this function to capture the order
     *
     * @param   $orderId returned from paypal and also defined in routes
     * @return \Illuminate\Http\Response
     */
    public function capturePaymentWithpaypal($orderId)
    {


        $paypal_conf = \Config::get('paypal');
        $clientId = $paypal_conf['client_id'];
        $clientSecret = $paypal_conf['secret'];
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);
        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        $request = new OrdersCaptureRequest($orderId);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            $orderModelData = Session::get('orderModelData');
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            $test =json_encode($response->result->purchase_units);

            $user = Auth::user();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->order_id = $orderModelData->id;
            $transaction->transaction_id = $response->result->id;
            $transaction->payer_email = $response->result->payer->email_address;
            $transaction->payer_full_name = $response->result->payer->name->given_name;
            $transaction->currency = $response->result->purchase_units[0]->amount->currency_code;
            $transaction->amount = $response->result->purchase_units[0]->amount->value;
            $transaction->payee_email = $response->result->purchase_units[0]->payee->email_address;
            $transaction->time_paid_created_at = date('Y-m-d h:i:s', strtotime($response->result->create_time));
            $transaction->time_paid_updated_at = date('Y-m-d h:i:s', strtotime($response->result->update_time));
            $transaction->status = $response->result->status;
            $transaction->reference_id = $response->result->purchase_units[0]->reference_id;
            $transaction->save();

            $order = Order::where('id','=',$orderModelData->id)->first();
            $order->payment_status = 1;
            $order->save();


//            dd($response->result->purchase_units[0]->amount->value);
            echo json_encode($response); die;
        }catch (HttpException $ex) {
//            print_r($ex->getMessage());
            echo $ex->statusCode; die;

        }

    }

    public function convertAmount($currency,$amount){

        if($currency == 'EUR'){
            $amount = floatval($amount) * 1.2;
            $amount = number_format((float)$amount, 2, '.', '');

        }
        elseif ($currency == 'AUD'){
            $amount = floatval($amount) * 0.77;
            $amount = number_format((float)$amount, 2, '.', '');

        }
        elseif ($currency == 'GBP'){
            $amount = floatval($amount) * 1.37;
            $amount = number_format((float)$amount, 2, '.', '');
        }
        elseif ($currency == 'USD'){
            $amount = floatval($amount) * 1;
            $amount = number_format((float)$amount, 2, '.', '');
        }
        return ($amount);
    }

    public function paypalSmartButtons()
    {
        $paymentId = request('tx');
        $order_id = \request('order_id');
        $order = Order::findOrFail($order_id);
        if ($paymentId) {
//            $transaction = new Transaction();
//            $transaction->order_id = $order_id;
//            $transaction->user_id = $order->user_id;
//            $transaction->amount = $order->amount;
//            $transaction->method = "paypal";
//            $transaction->transaction_reference = $paymentId;
//            $transaction->status = 1;
//            $transaction->save();


            $order->payment_status = 1;
            $order->save();


            return response([
                'order_id' => encrypt($order_id)
            ]);
        }
        return redirect()->back();
    }

}
// You can also define return and cancel urls here.
