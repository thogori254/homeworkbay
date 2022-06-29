@extends('layouts.usersidelayout')


@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pay</h1>

    <!-- Content Row -->
    <div class="row justify-content-center">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="h5 mb-0 font-weight-bold text-gray-800">Edit order</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Delete order</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @php $src = str_replace("public/","",$order->file);
    @endphp
    <div class="form-row">
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Academic Level</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->ac_level}}"
                       id="" name="" disabled>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Subject or discipline</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->subject}}"
                       id="" name="" disabled>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Type of paper</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder=""
                       value="{{$order->paper_type}}" id="" name="" disabled>
            </div>
        </div>
    </div>



    <div class="form-group">
        <label class="dosha-label-style" for="">Title</label>
        <input type="text" class="form-control form-control-lg" id="" name="" value="{{$order->title}}"
               disabled>
    </div>

    <div class="form-group">
        <label class="dosha-label-style" for="">Your instructions</label>
        <textarea class="form-control" id="" name="" rows="5"
                  disabled>{{$order->instructions}}</textarea>
    </div>

    <div class="form-group">
        <img  width = "100%" height = "300px" src="{{ asset('storage/'.$src) }}" alt="rec" onerror="this.style.display='none'">
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Citation Style</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->citation}}"
                       id="" name="" disabled>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Spacing</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->spacing}}"
                       id="" name="" disabled>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Writer category</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder=""
                       value="{{$order->writer_category}}" id="" name="" disabled>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Number of pages</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->number_of_pages}}"
                       id="" name="" disabled>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Number of sources</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->number_of_sources}}"
                       id="" name="" disabled>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Number of owerpoint slidess</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder=""
                       value="{{$order->number_of_powerpoints}}" id="" name="" disabled>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Deadline</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->deadline}}"
                       id="" name="" disabled>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Time</label>
            <div>
                @php
                $temp = substr ($order->deadline, -3);
                if($temp == "hrs"){
                    $newtemp = substr($order->deadline, 0, -3);
                    $hours_to_add = (int)$newtemp;
                    $time = new DateTime($order->created_at);
                    $time->modify("+{$hours_to_add} hours");

                    $stamp = $time->format('Y-m-d H:i');
                }
                elseif($temp == "ays"){
                    $newtemp = substr($order->deadline, 0, -4);
                    $newtemp2 = (int)$newtemp * 24;
                    $hours_to_add = $newtemp2;
                    $time = new DateTime($order->created_at);
                    $time->modify("+{$hours_to_add} hours");

                    $stamp = $time->format('Y-m-d H:i');
                }
                @endphp
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$stamp}}"
                       id="" name="" disabled>
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Currency</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder=""
                       value="{{$order->currency}}" id="" name="" disabled>
            </div>
        </div>
    </div>


    <div>
        <div id="paypal-button-container" style=""></div>
        You don't need to have a paypal account to use the above option
    </div>


@endsection


@section('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AS73eGH9UUncnI5Yi-4xD3TWdd3q0gvru9cccOYEJiCB2aXsvwEAljZ9-oht0ihGfzTdbotQK8xczGIa&disable-funding=credit,card"></script>

    <script>

        paypal.Buttons(({
            style:{
                color:'blue',
                    shape:'pill',
                size:'small',
                display:'none'

            },
            createOrder: function (data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $order->Total_price }}'
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function (details) {
                    // This function shows a transaction success message to your buyer.
                    // console.log(details);
                    var order_id = '{{ $order->id }}';
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "{{ url('order/charge') }}",
                        data: {tx: details.id, order_id: order_id},
                        success: function (data) {
                            if (data.order_id) {
                                window.location.href = "{{ url('/user/home')}}";

                            }
                        }
                    })
                });
            }
        })).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>


    {{--    <script>--}}
    {{--        // Render the PayPal button into #paypal-button-container--}}
    {{--        // X-CSRF-TOKEN is also required to add in request, otherwise you will not be able to access the createorder url--}}
    {{--        paypal.Buttons({--}}
    {{--            // Call your server to set up the transaction--}}
    {{--            createOrder: function(data, actions) {--}}
    {{--                var _token = "{{ csrf_token() }}";--}}
    {{--                return fetch('{{url('createorder')}}', {--}}
    {{--                    method: 'post',--}}
    {{--                    headers: {--}}
    {{--                        'X-CSRF-TOKEN': _token,--}}
    {{--                        'Content-Type': 'application/json',--}}
    {{--                    },--}}
    {{--                }).then(function(res) {--}}
    {{--                    return res.json();--}}
    {{--                }).then(function(orderData) {--}}
    {{--                    return orderData.result.id;--}}
    {{--                });--}}
    {{--            },--}}
    {{--            // Call your server to finalize the transaction--}}
    {{--            onApprove: function(data, actions) {--}}
    {{--                var _token = "{{ csrf_token() }}";--}}
    {{--                return fetch('{{url('captureorder')}}' + '/' + data.orderID + '/capture/', {--}}
    {{--                    method: 'post',--}}
    {{--                    headers: {--}}
    {{--                        'X-CSRF-TOKEN': _token,--}}
    {{--                        'Content-Type': 'application/json',--}}
    {{--                    },--}}
    {{--                }).then(function(res) {--}}
    {{--                    return res.json();--}}
    {{--                }).then(function(orderData) {--}}
    {{--                    // Three cases to handle:--}}
    {{--                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()--}}
    {{--                    //   (2) Other non-recoverable errors -> Show a failure message--}}
    {{--                    //   (3) Successful transaction -> Show a success / thank you message--}}
    {{--                    // Your server defines the structure of 'orderData', which may differ--}}
    {{--                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];--}}
    {{--                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {--}}
    {{--                        // Recoverable state, see: "Handle Funding Failures"--}}
    {{--                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/--}}
    {{--                        return actions.restart();--}}
    {{--                    }--}}
    {{--                    if (errorDetail) {--}}
    {{--                        var msg = 'Sorry, your transaction could not be processed.';--}}
    {{--                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;--}}
    {{--                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';--}}
    {{--                        // Show a failure message--}}
    {{--                        return alert(msg);--}}
    {{--                    }--}}
    {{--                    // Show a success message to the buyer--}}
    {{--                    alert('Transaction completed by ' + orderData.result.payer.name.given_name);--}}
    {{--                    // alert('Transaction completed by ' + orderData.result.purchase_units.amount.value);--}}

    {{--                });--}}
    {{--            }--}}
    {{--        }).render('#paypal-button-container');--}}
    {{--    </script>--}}
@endsection
