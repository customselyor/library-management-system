<x-admin-layout>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.microorganisms') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.microorganisms') }}</li>
                    </ol>
                </div>
                {{--<!-- /.col -->--}}
            </div>
            {{--<!-- /.row -->--}}
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content-header -->--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('messages.microorganisms') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('microorganisms.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('messages.create') }}
                                </a>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>{{ __('messages.status') }}</th>
										<th>{{ __('messages.title') }}</th>
										<th>{{ __('messages.micro_categories') }}</th>
										<th>{{ __('messages.micro_sub_categories') }}</th>
										<th>{{ __('messages.micro_child_sub_categories') }}</th>
										 

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($microorganisms as $microorganism)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{!! ($microorganism->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>

											<td>{{ $microorganism->title }}</td>
											<td>{{ $microorganism->microCategory->title }}</td>
											<td>{{ $microorganism->microSubCategory->title }}</td>
											<td>{{ $microorganism->microChildSubCategory->title }}</td>

                                            <td>
                                                <form action="{{ route('microorganisms.destroy',$microorganism->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('microorganisms.show',$microorganism->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.view') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('microorganisms.edit',$microorganism->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('messages.edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('messages.delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $microorganisms->links() !!}
            </div>
        </div>
    </div>
</x-admin-layout>
