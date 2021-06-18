<div>
    {{--<!-- Content Header (Page header) -->--}}
    <div class="content-header" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml"
         xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users Management') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Users Management') }}</li>
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
                                {{ __('Users Management') }}
                                <button class="btn btn-primary btn-lg pull-right" wire:click="store()">Save </button>
                            </span>
                                <div class="float-right">

                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-default">
                                        {{ __('Create') }}
                                    </button>


                                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form >
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="required" for="name">Name </label>
                                                                    <input
                                                                            type="Text"
                                                                            class="form-control  {{ $errors->has($name) ? 'is-invalid' : '' }}"
                                                                            name="name"
                                                                            id="name"
                                                                            wire:model="name"
                                                                            placeholder="Name"
                                                                    />
                                                                    {{$name}}
                                                                    @if($errors->has($name))
                                                                        <div class="invalid-feedback">
                                                                            {{ $errors->first($name) }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="required" for="email">Email:</label>
                                                                    <input
                                                                            type="email"
                                                                            class="form-control  {{ $errors->has($email) ? 'is-invalid' : '' }}"
                                                                            name="email"
                                                                            id="email"
                                                                            wire:model="email"
                                                                            placeholder="Email"
                                                                    />
                                                                    @if($errors->has($email))
                                                                        <div class="invalid-feedback">
                                                                            {{ $errors->first($email) }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <strong>Password:</strong>
                                                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <strong>Confirm Password:</strong>
                                                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="inline-block w-32 font-bold">Role:</label>
                                                                    <select name="role" wire:model="role_id"
                                                                            class="border shadow p-2 bg-white">
                                                                        <option value=''>Choose a role</option>
                                                                        @foreach($roles as $role)
                                                                            <option value={{ $role }}>{{ $role}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button class="btn btn-primary btn-lg pull-right"
                                                            type="submit"
                                                            wire:click.prevent="store()">Save
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
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
                    </div>
                </div>
            </div>
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content -->--}}

</div>