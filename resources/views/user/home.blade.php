@extends('layouts.usersidelayout')



@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Academic Level</th>
                        <th>Subject</th>
                        <th>Type of paper</th>
                        <th>Citation</th>
                        <th>Spacing</th>
                        <th>Deadline</th>
                        <th>Currency</th>
                        <th>Number of pages</th>
                        <th>Number of sources</th>
                        <th>Number of powerpoint slides</th>
                        <th>Writer category</th>
                        <th>Instructions</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>Date submitted</th>
                        <th>Total price</th>
                        <th>Edit</th>
                        <th>Pay</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Academic Level</th>
                        <th>Subject</th>
                        <th>Type of paper</th>
                        <th>Citation</th>
                        <th>Spacing</th>
                        <th>Deadline</th>
                        <th>Currency</th>
                        <th>Number of pages</th>
                        <th>Number of sources</th>
                        <th>Number of powerpoint slides</th>
                        <th>Writer category</th>
                        <th>Instructions</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>Date submitted</th>
                        <th>Total price</th>
                        <th>Edit</th>
                        <th>Pay</th>
                        <th>Delete</th>

                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$order->title}}</td>
                            <td>{{$order->ac_level}}</td>
                            <td>{{$order->subject}}</td>
                            <td>{{$order->paper_type}}</td>
                            <td>{{$order->citation}}</td>
                            <td>{{$order->spacing}}</td>
                            <td>{{$order->deadline}}</td>
                            <td>{{$order->currency}}</td>
                            <td>{{$order->number_of_pages}}</td>
                            <td>{{$order->number_of_sources}}</td>
                            <td>{{$order->number_of_powerpoints}}</td>
                            <td>{{$order->writer_category}}</td>
                            <td>{{$order->instructions}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->file}}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{$order->Total_price}}</td>
                            <td><a href="#" class="btn btn-warning btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    <span class="text">Split Button Warning</span>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    <span class="text">Split Button Success</span>
                                </a>
                            </td>
                            <td><a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
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
