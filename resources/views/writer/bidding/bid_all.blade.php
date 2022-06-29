@extends('layouts.writerlayout')



@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders you can bid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Index</th>
                        <th>Order id</th>
                        <th>Title</th>
                        <th>Academic Level</th>
                        <th>Deadline</th>
                        <th>Number of pages</th>
                        <th>Number of powerpoint slides</th>
                        <th>Total price</th>
                        <th>Bid</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Index</th>
                        <th>Order id</th>
                        <th>Title</th>
                        <th>Academic Level</th>
                        <th>Deadline</th>
                        <th>Number of pages</th>
                        <th>Number of powerpoint slides</th>
                        <th>Total price</th>
                        <th>Bid</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->title}}</td>
                            <td>{{$order->ac_level}}</td>
                            <td>{{$order->deadline_date}}</td>
                            <td>{{$order->number_of_pages}}</td>
                            <td>{{$order->number_of_powerpoints}}</td>
                            <td>{{$order->Total_price}}</td>
                            <td>
                                <a href="{{route('bid_order',Crypt::encrypt($order->id))}}" class="btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    <span class="text">Bid</span>
                                </a>
                            </td>

                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection
