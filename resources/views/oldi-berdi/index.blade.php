<x-admin-layout>
    <link href="{{ asset('qr_scaner/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('qr_scaner/css/style.css') }}" rel="stylesheet">

    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('messages.oldi_berdi') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('messages.oldi_berdi') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->

        <x-loading-indicator />

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span id="card_title">
                                        {{ __('messages.oldi_berdi') }}
                                    </span>
                                    <div class="float-right">

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="container" id="QR-Code">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="navbar-form navbar-right">
                                                <select class="form-control" id="camera-select"></select>
                                                <div class="form-group">

                                                    <button title="Decode Image" class="btn btn-default btn-sm"
                                                        id="decode-img" type="button" data-toggle="tooltip"><span
                                                            class="glyphicon glyphicon-upload"></span></button>
                                                    <button title="Image shoot" class="btn btn-info btn-sm disabled"
                                                        id="grab-img" type="button" data-toggle="tooltip"><span
                                                            class="glyphicon glyphicon-picture"></span></button>
                                                    <button title="Play" class="btn btn-success btn-sm" id="play"
                                                        type="button" data-toggle="tooltip"><span
                                                            class="glyphicon glyphicon-play"></span></button>
                                                    <button title="Pause" class="btn btn-warning btn-sm" id="pause"
                                                        type="button" data-toggle="tooltip"><span
                                                            class="glyphicon glyphicon-pause"></span></button>
                                                    <button title="Stop streams" class="btn btn-danger btn-sm" id="stop"
                                                        type="button" data-toggle="tooltip"><span
                                                            class="glyphicon glyphicon-stop"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body text-center">
                                            <div class="col-md-6">
                                                <div class="well"
                                                    style="position: relative;display: inline-block;">
                                                    <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                                                    <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;">
                                                    </div>
                                                    <div class="scanner-laser laser-rightTop" style="opacity: 0.5;">
                                                    </div>
                                                    <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;">
                                                    </div>
                                                    <div class="scanner-laser laser-leftTop" style="opacity: 0.5;">
                                                    </div>
                                                </div>

                                                <div class="well" style="width: 100%; ">
                                                    <label id="zoom-value" width="100">Zoom: 2</label>
                                                    <input id="zoom" onchange="Page.changeZoom();" type="range" min="10"
                                                        max="30" value="20">
                                                    <label id="brightness-value" width="100">Brightness: 0</label>
                                                    <input id="brightness" onchange="Page.changeBrightness();"
                                                        type="range" min="0" max="128" value="0">
                                                    <label id="contrast-value" width="100">Contrast: 0</label>
                                                    <input id="contrast" onchange="Page.changeContrast();" type="range"
                                                        min="0" max="64" value="0">
                                                    <label id="threshold-value" width="100">Threshold: 0</label>
                                                    <input id="threshold" onchange="Page.changeThreshold();"
                                                        type="range" min="0" max="512" value="0">
                                                    <label id="sharpness-value" width="100">Sharpness: off</label>
                                                    <input id="sharpness" onchange="Page.changeSharpness();"
                                                        type="checkbox">
                                                    <label id="grayscale-value" width="100">grayscale: off</label>
                                                    <input id="grayscale" onchange="Page.changeGrayscale();"
                                                        type="checkbox">
                                                    <br>
                                                    <label id="flipVertical-value" width="100">Flip Vertical:
                                                        off</label>
                                                    <input id="flipVertical" onchange="Page.changeVertical();"
                                                        type="checkbox">
                                                    <label id="flipHorizontal-value" width="100">Flip Horizontal:
                                                        off</label>
                                                    <input id="flipHorizontal" onchange="Page.changeHorizontal();"
                                                        type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="thumbnail" id="result">
                                                    <div class="well" style="overflow: hidden;">
                                                        <img width="320" height="240" id="scanned-img" src="">
                                                    </div>
                                                    <div class="caption">
                                                        <div class="input-group">
                                                            <input type="text" id="scanned-QR" class="form-control"
                                                                autofocus />
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" id='qidirish_qr'
                                                                    type="button">Qidirish</button>
                                                            </span>
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class='text-left' id="user_data">
                                                    <div class="form-group">
                                                        <strong>{{ __('messages.photo') }}:</strong>
                                                        {{-- <span id="image"></span> --}}
                                                        <img src='/' id="image" width="80px" />
                                                        {{-- @if ($user->profile->image)
                                                            <img src="{{ asset('/storage/user/avatar/' . $user->profile->image) }}"
                                                                width="100px">
                                                        @endif --}}
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>{{ __('messages.title') }}:</strong>
                                                        <span id="name"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>{{ __('messages.email') }}:</strong>
                                                        <span id="email"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>{{ __('messages.qr_number') }}:</strong>
                                                        <span id="qr_code"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                    </div>
                                    <div class="col-md-8">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="book_data2">

                                        <div class="table-responsive">
                                            <form method="POST" action="{{ route('qrcode.store') }}" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name='kitobxon_id' id="kitobxon_id">

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>{{ __('messages.title') }}</th>
                                                            <th>{{ __('messages.author') }}</th>
                                                            <th>{{ __('messages.qr_number') }}</th>
                                                            <th>{{ __('messages.for_how_many_days') }}</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">

                                                    </tbody>
                                                </table>
                                                <div class="box-footer mt20">
                                                    <button type="submit" id='saveBtn'
                                                        class="btn btn-primary">{{ __('messages.save') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>

    </div>


    @push('scripts')

        <script type="text/javascript" src="{{ asset('qr_scaner/js/filereader.js') }}"></script>

        <script type="text/javascript" src="{{ asset('qr_scaner/js/qrcodelib.js') }}"></script>
        <script type="text/javascript" src="{{ asset('qr_scaner/js/webcodecamjs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('qr_scaner/js/main.js') }}"></script>

    @endpush

</x-admin-layout>
