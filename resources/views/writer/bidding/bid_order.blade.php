@extends('layouts.writerlayout')



@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bid on Order # {{$order->id}}</h1>



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
            <label class="dosha-label-style" for="file">Download additional materials from client</label>
        @if (empty($order->file))
            <h6 style="color:red;">No file provided</h6>
        @else
            <h6 style="color: #20c9a6;">{{$order->file}}</h6>
        @endif
        <div>
        <a href="{{url('/downloadFile',$order->file)}}" class="btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
            <span class="text">Download file</span>
        </a>
        </div>

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
            <label class="dosha-label-style" for="">Number of powerpoint slides</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder=""
                       value="{{$order->number_of_powerpoints}}" id="" name="" disabled>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Price</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->Total_price}}"
                       id="" name="" disabled>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="dosha-label-style" for="">Time</label>
            <div>
                <input type="text" class="form-control form-control-md" placeholder="" value="{{$order->deadline_date}}"
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
        <a href="{{}}" class="btn btn-success btn-icon-split btn-lg">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
            <span class="text">Bid</span>
        </a>
    </div>


@endsection


@section('scripts')


@endsection
