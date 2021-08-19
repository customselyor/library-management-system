<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Language Settings') }}</h1>
            </div>
            {{--<!-- /.col -->--}}
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Language Settings') }}</li>
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
                                {{ __('Language Settings') }}
                            </span>
                            <div class="float-right">
                                @if($show_create | $is_view_mode)
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <button wire:click="increment">+</button>
                    <h1>{{ $count }}</h1>
                    {{$show_create}}
                    @if($show_create)
                        @include('livewire.admin.books.create')
                    @elseIf($is_view_mode)
                        @include('livewire.admin.books.view')
                    @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Abbreviation') }}</th>
                                    <th>{{ __('Icon') }}</th>
                                    <th width="280px">{{ __('Action') }}</th>
                                </tr>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->icon }}</td>
                                        <td>
                                            {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!} --}}
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