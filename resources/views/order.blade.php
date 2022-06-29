@extends('layouts.userlayout')



@section('content')
    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-title"> Place an Order</div>
                </div> <!-- end of col -->
            </div>
            <div class="row">
                <div class="col-md-9">
                    <hr/>
                    @guest
                        <div class="dosha-tab">
                            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">New here?
                                Kindly
                                Register to place an order
                            </button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">A returning customer? Kindly
                                Login
                                to place an order
                            </button>

                        </div>

                        <div id="London" class="tabcontent">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div id="Paris" class="tabcontent">

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    @endguest
                    <form action="{{url('store_order')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Alevel" class="col-form-label"><b>Academic Level</b></label>


                            <div style="float: right;" class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-primary active">
                                    <input type="radio" name="al_options" id="Highschool" autocomplete="off"
                                           value="Highschool" checked>
                                    High School
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="al_options" id="Undergraduate" value="Undergraduate"
                                           autocomplete="off">
                                    Undergraduate
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="al_options" id="Masters" value="Masters"
                                           autocomplete="off"> Master's
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="al_options" id="PhD" value="PhD" autocomplete="off"> PhD
                                </label>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="dosha-label-style" for="inputTitle">Title</label>
                            <input type="text" class="form-control form-control-lg" id="inputTitle" name="inputTitle"
                                   placeholder="">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="dosha-label-style" for="inputSubject">Subject or discipline</label>
                                <select name="inputSubject" id="inputSubject" class="form-control form-control-lg">
                                    <option selected>Please select...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="dosha-label-style" for="inputPaper">Type of paper</label>
                                <select name="inputPaper" id="inputPaper" class="form-control form-control-lg">
                                    <option selected>Essay</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="dosha-label-style" for="TextareaInstructions">Your instructions</label>
                            <textarea class="form-control" id="TextareaInstructions" name="TextareaInstructions" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="dosha-label-style" for="file">Upload additional materials (optional)</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="dosha-label-style" for="inputCitation">Citation style</label>
                                <select id="inputCitation" name="inputCitation" class="form-control form-control-lg">
                                    <option selected>APA</option>
                                    <option>MLA</option>
                                    <option>Havard</option>
                                    <option>Chicago</option>
                                    <option>Turabian</option>
                                    <option>Oxford</option>
                                    <option>CBE</option>
                                    <option>Vancouver</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <div>
                                <label class="dosha-label-style" for="">Spacing</label>
                                </div>

                                <label class="radio-inline col-md-5" style="border: 1px solid #14bf98;
                                                    border-radius: 4px;
                                                    transition: all ease .5s;
                                                    background-color: #14bf98;
                                                            color: white;">
                                    <input type="radio" name="spacing" value="doublespace" checked>
                                    <div style="padding: 5%;">
                                        Double spaced
                                    </div>
                                </label>
                                <label class="radio-inline col-md-5" style="border: 1px solid #14bf98;
                                                    border-radius: 4px;
                                                    transition: all ease .5s;
                                                       background-color: #14bf98;
                                                            color: white;">
                                    <input type="radio" name="spacing" value="singlespace">
                                    <div style="padding: 5%;">
                                        Single spaced
                                    </div>
                                </label>

{{--                                <select id="inputSpacing" class="form-control form-control-lg">--}}
{{--                                    <option value="doublespace">Double spaced</option>--}}
{{--                                    <option value="singlespace">Single spaced</option>--}}
{{--                                </select>--}}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="dosha-label-style" for="inputDeadline">Deadline</label>
                                <select id="inputDeadline" name="inputDeadline" class="form-control form-control-lg">
                                    <option disabled="disabled" value="0hrs" selected="selected">Select a deadline</option>
                                    <option value="3hrs">3 hours</option>
                                    <option value="6hrs">6 hours</option>
                                    <option value="8hrs">8 hours</option>
                                    <option value="12hrs">12 hours</option>
                                    <option value="24hrs">24 hours</option>
                                    <option value="48hrs">48 hours</option>
                                    <option value="3days">3 days</option>
                                    <option value="4days">4 days</option>
                                    <option value="7days">7 days</option>
                                    <option value="11days">11 days</option>
                                    <option value="14days">14 days</option>
                                    <option value="21days">21 days</option>

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="dosha-label-style" for="inputCurrency">Currency</label>
                                <select id="inputCurrency" name="inputCurrency" class="form-control form-control-lg">
                                    <option value="usd" selected>USD</option>
{{--                                    <option value="gbp">GBP</option>--}}
{{--                                    <option value="eur">EUR</option>--}}
{{--                                    <option value="aud">AUD</option>--}}
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="dosha-label-style" for="inputNop">Number of pages</label>
                                <div>
                                    <input type="number" class="form-control form-control-lg" placeholder="" value="1"
                                           id="inputFieldnop" name="inputFieldnop" min="0">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="dosha-label-style" for="inputSources">Number of sources</label>
                                <div>
                                    <input type="number" class="form-control form-control-lg" placeholder="" value="0"
                                           id="inputFieldnos" name="inputFieldnos" min="0">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="dosha-label-style" for="inputpowerpoints">Number of powerpoint
                                    slides</label>
                                <div>
                                    <input type="number" class="form-control form-control-lg" placeholder=""
                                           value="0" id="inputFieldnopps" name="inputFieldnopps" min="0">
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="dosha-label-style">Writer category</p>
                        </div>


                        <!-- create the div inline boxes -->
                        <div style="margin-bottom: 30px;" class="form-row">
                            <!-- create the product container the user sees -->
                            <div class="col-md-4" style="padding:10px;">
                                <input id="standardwriter" type="radio" name="writer_type_radio" value="Standard"
                                       checked>
                                <label for="standardwriter" class="clickable">
                                    <span class="checked-box">&#10004;</span>
                                </label>
                                <div>
                                    <h5 class=" text-uppercase text-center">Standard</h5>
                                </div>
                                <hr>
                                <div>
                                    <small>
                                        Standard price writers
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input id="premiumwriter" type="radio" name="writer_type_radio" value="Premium">
                                <label for="premiumwriter" class="clickable">
                                    <span class="checked-box">&#10004;</span>
                                </label>

                                <div>
                                    <h5 class=" text-uppercase text-center">Premium</h5>
                                </div>
                                <hr>
                                <div>
                                    <small>
                                        High-rank writer, proficient in the requested
                                        field of study
                                        <br>
                                        Detailed Plagiarism Check - Our editor will
                                        prepare the detailed plagiarism report of your paper
                                        <br>
                                        Urgent Writer Assign - Your order gets higher
                                        priority between the others
                                        <br>
                                    </small>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <input id="supremewriter" type="radio" name="writer_type_radio" value="Supreme">
                                <label for="supremewriter" class="clickable">
                                    <span class="checked-box">&#10004;</span>
                                </label>
                                <div>
                                    <h5 class=" text-uppercase text-center">Supreme</h5>
                                </div>
                                <hr>
                                <div>
                                    <small>
                                        High-rank writer, proficient in the requested
                                        field of study
                                        <br>
                                        Detailed Plagiarism Check - Our editor will
                                        prepare the detailed plagiarism report of your paper
                                        <br>
                                        Urgent Writer Assign - Your order gets higher
                                        priority between the others
                                        <br>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="aggprice" name="aggprice" value="">
                        <input type="hidden" id="aggpprice" name="aggpprice" value="">
                        <input type="hidden" id="aggsprice" name="aggsprice" value="">

                        @auth
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary btn-lg" value="Make an order">
                        </div>
                        @endauth

                    </form>


                </div> <!-- end of col -->

                <div class="col-md-3">
                    <div class="sticky-top">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pricecalculate">
                                    <div class="order_title" id="title_right">

                                    </div>
                                    <div class="order_alevel" id="alevel_right">

                                    </div>
                                    <hr>
                                    <div class="order_tpaper" id="tpaper_right">

                                    </div>

                                    <div class="order_subjecta" id="subject_right">

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="order_pages float-left" id="pages_right">

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="totalsum font-weight-bold" id="pages_sum">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="order_slides float-left" id="slides_right">

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="order_slidesprice font-weight-bold" id="slides_sum">

                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-5 font-weight-bold">
                                            Total Price
                                        </div>
                                        <div class="col-sm-2 font-weight-bold">
                                            USD
                                        </div>
                                        <div class="col-sm-5 text-success font-weight-bold">
                                            <div class="orderamountc" id="total_amount">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-1 -->
        <!-- end of description -->
        @endsection

        @section('scripts')


            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>

            <script>
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("standardwriterdefault").click();
            </script>

            <script src="js/dosha-scripts.js"></script>

            <script>
                $(document).ready(function () {
                    var title = $("#inputTitle").val();
                    document.getElementById("title_right").textContent = title;

                    $('#inputTitle').change(function () {
                        var title = $(this).val();
                        document.getElementById("title_right").textContent = title;
                    });


                    var aclevel = $("input[name='al_options']:checked").val();
                    document.getElementById("alevel_right").textContent = aclevel;

                    $("input[name='al_options']").change(function () {
                        var aclevel = $(this).val();
                        document.getElementById("alevel_right").textContent = aclevel;
                    });

                    var paper = $("#inputPaper :selected").val();
                    document.getElementById("tpaper_right").textContent = paper;

                    $("#inputPaper").change(function () {
                        var paper = $(this).val();
                        document.getElementById("tpaper_right").textContent = paper;
                    });

                    var subject = $("#inputSubject :selected").val();
                    document.getElementById("subject_right").textContent = subject;

                    $("#inputSubject").change(function () {
                        var subject = $(this).val();
                        document.getElementById("subject_right").textContent = subject;
                    });

                });


            </script>
@endsection



