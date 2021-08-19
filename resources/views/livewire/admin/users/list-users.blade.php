<div xmlns:wire="http://www.w3.org/1999/xhtml">
    {{--<!-- Content Header (Page header) -->--}}
    <div class="content-header" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml"
         xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.users') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.users') }}</li>
                    </ol>
                </div>
                {{--<!-- /.col -->--}}
            </div>
            {{--<!-- /.row -->--}}
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content-header -->--}}
    {{--<!-- Main content -->--}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('messages.users') }}
                            </span>
                                <div class="float-right">
                                    @if($show_create)
                                        <button type="button" class="btn btn-primary" wire:click="HideCreate()">
                                            {{ __('messages.close') }}
                                        </button>
                                    @else 
                                        <button type="button" class="btn btn-primary" wire:click="ShowCreate()">
                                            {{ __('messages.create') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @if($show_create)
                            @include('livewire.admin.users.create')
                        @else
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>QR-Code</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($data as $key => $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- {{ ($user->profile)? QrCode::size(100)->generate($user->profile->qr_code):'' }}    --}}
                                                
                                                </td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {!! $data->render() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content -->--}}

</div>