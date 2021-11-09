<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        [x-cloak] {
            display: none;
        }

        @media print {

            header,
            footer,
            aside,
            form,
            .notprint {
                display: none;
            }

            #printElement {
                display: flex;
            }

            .Details {
                color: white;
                text-align: center;
                padding: 10px;
                font-size: 20px;
                background-color: #8338ec !important;
                -webkit-print-color-adjust: exact;
            }

        }

        .font {
            height: 375px;
            width: 250px;
            position: relative;
            border-radius: 10px;
        }



        .bottom {
            height: 70%;
            width: 100%;
            background-color: white;
            position: absolute;
        }

        .top img {
            height: 120px;
            width: 120px;
            border-radius: 10px;
            left: 30px;
            top: 5px;
        }

        .bottom p {
            position: relative;
            top: 60px;
            text-align: center;
            text-transform: capitalize;
            font-weight: bold;
            font-size: 20px;
            text-emphasis: spacing;
        }

        .bottom .desi {
            font-size: 12px;
            color: grey;
            font-weight: normal;
        }

        .bottom .no {
            font-size: 15px;
            font-weight: normal;
        }

        .barcode img {
            height: 120px;
            width: 120px;
            text-align: center;
        }

        .barcode {
            text-align: center;
            position: absolute;
            top: -7px;
            right: -10px;
        }

        .back {
            /* height: 310px;
            width: 540px; */
            /* background-color: #ffffff;
            border: 1px solid #000; */
        }

        .qr img {
            height: 80px;
            width: 100%;
            margin: 20px;
            background-color: white;
        }

        .Details {
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            background-color: #8338ec;
        }


        .details-info {
            line-height: 10px;
        }

        .logo {
            width: 46%;
            height: 40px;
        }

    </style>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    @if ($users->count() > 0)
                                        <div class="row">
                                            @foreach ($users as $user)


                                                @if ($user->profile != null)
                                                    <div class="col-md-6">
                                                        <div class="back">
                                                            <h1 class="Details">TOSHKENT KIMYO-TEXNOLOGIYA
                                                                INSTITUTI
                                                            </h1>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="top text-center">
                                                                        <div class="form-group">
                                                                            @if ($user->profile->image)
                                                                                <img src="{{ asset('/storage/avatar/' . $user->profile->image) }}"
                                                                                    width="100px">
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <strong>{{ $user->name }}</strong>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="details-info">
                                                                        <div class="barcode">
                                                                            @php
                                                                                \QRcode::png($user->profile->qr_code, 'card_qr_image.png', 'L', 4, 2);
                                                                                
                                                                            @endphp
                                                                            {{-- <img src="/qr_image.png" width="150px"> --}}
                                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents('card_qr_image.png')) }}"
                                                                                width="150px">

                                                                            <center>{{ $user->profile->qr_code }}
                                                                            </center>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <strong>{{ __('messages.email') }}:</strong>
                                                                            <span
                                                                                style="display:block; margin-top:8px">{{ $user->email }}</span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <strong>{{ __('messages.phone_number') }}:</strong>
                                                                            <span
                                                                                style="display:block; margin-top:8px">{{ $user->profile->phone_number }}</span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <strong>{{ __('messages.date_of_birth') }}:</strong>
                                                                            <span
                                                                                style="display:block; margin-top:8px">{{ $user->profile->date_of_birth }}</span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <strong>{{ __('messages.faculty') }}:</strong>
                                                                            <span
                                                                                style="display:block; margin-top:8px">{{ $user->profile->faculty->name }}</span>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group text-center">
                                                                <span
                                                                    style="font-size: 10px;display:block;margin-top:-12px;line-height: 15px;">Toshkent
                                                                    sh. Navoiy ko’chasi, 32 uy, 100011,
                                                                    Telefon(998-71)244-79-20</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            @endforeach

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('dist/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> --}}

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- InputMask -->
    <script src="{{ asset('dist/js/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('dist/js/bootstrap-switch.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>

    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.close();
            }, 1);
        }
    </script>

</body>

</html>
