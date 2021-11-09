<x-admin-layout>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.users') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.users') }}</li>
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
                <div class="col-sm-12">
                    <!-- COLOR PALETTE -->
                    <div class="card card-default color-palette-box">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-tag"></i>
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- /.col-12 -->
                            <div class="row">
                                <form action="{{ route('users.index') }}" method="GET" accept-charset="UTF-8"
                                    class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="required"
                                                for="from">{{ __('messages.from') }}:</label>
                                            <input type="text" class="form-control " name="from" id="from"
                                                value="{{ $from }}" placeholder="{{ __('messages.from') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="required" for="from">{{ __('messages.to') }}:</label>
                                            <input type="text" class="form-control " name="to" id="to"
                                                value="{{ $to }}" placeholder="{{ __('messages.to') }}" />
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        {{-- <input type="text" class="form-control" name="search" placeholder="{{ __('messages.search') }}..." value="{{ request('search') }}"> --}}
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">

                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('messages.users') }}
                                </span>
                                <div class="float-right">
                                    @if ($from && $to)
                                        <a class="btn btn-sm btn-primary " target="__blank"
                                            href="{{ route('users.card', Request::all()) }}"><i
                                                class="fa fa-fw fa-print"></i> {{ __('messages.download') }}</a>
                                    @endif
                                    <a class="btn btn-success" href="{{ route('users.create') }}">
                                        {{ __('messages.create') }}</a>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>{{ __('messages.qr_number') }}</th>
                                        <th>{{ __('messages.title') }}</th>
                                        <th>{{ __('messages.email') }}</th>
                                        <th>{{ __('messages.roles') }}</th>
                                        <th width="280px"></th>
                                    </tr>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->profile ? $user->profile->qr_code : '' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('users.show', $user->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                                <a class="btn btn-info"
                                                    href="{{ route('users.card', ['id' => $user->id]) }}"
                                                    target="__blank"><i class="far fa-id-card"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {!! $users->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-admin-layout>
