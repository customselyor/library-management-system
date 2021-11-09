<x-admin-layout>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.view') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('users.index') }}"> {{ __('messages.users') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.view') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <style>
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
            height: 150px;
            width: 150px;
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
            height: 150px;
            width: 150px;
            text-align: center;
        }

        .barcode {
            text-align: center;
            position: absolute;
            top: -7px;
            right: -10px;
        }

        .back {
            height: 410px;
            width: 650px;
            background-color: #ffffff;
            border: 1px solid #000;
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
            font-size: 25px;
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
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('messages.view') }}</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('users.index') }}">
                                    {{ __('messages.back') }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>{{ __('messages.title') }}:</strong>
                                {{ $user->name }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('messages.email') }}:</strong>
                                {{ $user->email }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('messages.roles') }}:</strong>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                            @if ($user->profile != null)
                                <hr>
                                <h3>{{ __('messages.profile_info') }}</h3>
                                <div class="form-group">
                                    <strong>{{ __('messages.date_of_birth') }}:</strong>
                                    {{ $user->profile->date_of_birth }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.photo') }}:</strong>
                                    @if ($user->profile->image)
                                        <img src="{{ asset('/storage/avatar/' . $user->profile->image) }}"
                                            width="100px">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.phone_number') }}:</strong>
                                    {{ $user->profile->phone_number }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.passport_seria_number') }}:</strong>
                                    {{ $user->profile->passport_seria_number }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.kursi') }}:</strong>
                                    {{ $user->profile->kursi }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.faculties') }}:</strong>
                                    {{ $user->profile->faculty->name }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.genders') }}:</strong>
                                    {{ $user->profile->gender->name }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.user_types') }}:</strong>
                                    {{ $user->profile->userType->name }}
                                </div>
                                <div class="form-group">
                                    <strong>{{ __('messages.qr_number') }}:</strong>

                                    @php
                                        \QRcode::png($user->profile->qr_code, 'qr_image.png', 'L', 4, 2);
                                    @endphp
                                    {{-- <img src="/qr_image.png" width="150px"> --}}



                                    <div class="qr_code_list" style="display: block">
                                        <center>
                                            {{-- <img src="{{ asset('/qr_image.png') }}" width="150px"> --}}
                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents('qr_image.png')) }}"
                                                width="150px">
                                        </center>
                                        <center>{{ $user->profile->qr_code }}</center>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <strong>{{ __('messages.book_enter') }}:</strong>
                                {{ $books_count }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="container">
                                {{-- <div class="padding">
                                    <div class="font">
                                        <div class="top">
                                            <img src="/download.png">
                                        </div>
                                        <div class="bottom">
                                            <p>Zadafiya Brothers</p>
                                            <p class="desi">UX/UI Designer</p>
                                            <div class="barcode">
                                                <img src="/qr_sample.png">
                                            </div>
                                            <br>
                                            <p class="no">+91 8980849796</p>
                                            <p class="no">part-1,89 harinadad d...sdv..sdf..sfd..sd.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                @if ($user->profile != null)
                                    <div class="back">


                                        <h1 class="Details">TOSHKENT KIMYO-TEXNOLOGIYA INSTITUTI</h1>

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
                                                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents('qr_image.png')) }}"
                                                            width="150px">
                                                        <center>{{ $user->profile->qr_code }}</center>
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
                                            <span style="display:block; margin-top:-12px;line-height: 15px;">Toshkent
                                                sh. Navoiy ko’chasi, 32 uy, 100011, Telefon(998-71)244-79-20</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
