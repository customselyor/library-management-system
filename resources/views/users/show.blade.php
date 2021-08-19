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
                            <a  href="{{ route('users.index') }}"> {{ __('messages.users') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.view') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
                                <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('messages.back') }}</a>
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
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
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
                                        <img src="{{ asset('/storage/user/avatar/'.$user->profile->image) }}" width="100px">
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
                                    {{ \QRcode::png($user->profile->qr_code, 'qr_image.png', 'L', 4, 2)}}
                                    
                                    <div class="qr_code_list" style="display: block">
                                        <center>
                                            <img src="/qr_image.png" width="150px">
                                        </center>
                                        <center>{{$user->profile->qr_code}}</center>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <strong>{{ __('messages.book_enter') }}:</strong>
                                {{$books_count}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
