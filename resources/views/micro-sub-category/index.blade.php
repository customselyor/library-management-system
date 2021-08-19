<x-admin-layout>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.micro_sub_categories') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.micro_sub_categories') }}</li>
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
                                {{ __('messages.micro_sub_categories') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('micro-sub-categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>{{ __('messages.title') }}</th>
										{{-- <th>{{ __('messages.photo') }}</th>
										<th>{{ __('messages.is_favorite') }}</th> --}}
										<th>{{ __('messages.status') }}</th> 
										<th>{{ __('messages.micro_categories') }} </th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($microSubCategories as $microSubCategory)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $microSubCategory->title }}</td>
											{{-- <td>{{ $microSubCategory->image }}</td>
											<td>{!! ($microSubCategory->is_favorite==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td> --}}
											<td>{!! ($microSubCategory->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
 											<td>{{ $microSubCategory->microCategory->title }}</td>
											 
                                            <td>
                                                <form action="{{ route('micro-sub-categories.destroy',$microSubCategory->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('micro-sub-categories.show',$microSubCategory->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.view') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('micro-sub-categories.edit',$microSubCategory->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('messages.edit') }}</a>
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
                {!! $microSubCategories->links() !!}
            </div>
        </div>
    </div>
</x-admin-layout>
