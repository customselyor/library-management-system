<x-admin-layout>
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.books') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.books') }}</li>
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
                                 <form action="{{ route('books.inventars') }}" method="GET" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="required" for="from">{{ __('messages.from') }}:</label>
                                            <input
                                                    type="text"
                                                    class="form-control "
                                                    name="from"
                                                    id="from"
                                                    value="{{$from}}"
                                                    placeholder="{{ __('messages.from') }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="required" for="from">{{ __('messages.to') }}:</label>
                                            <input
                                                    type="text"
                                                    class="form-control "
                                                    name="to"
                                                    id="to"
                                                    value="{{$to}}"
                                                    placeholder="{{ __('messages.to') }}"
                                            />
                                        </div>
                                    </div>

                                    <div class="input-group">

                                        {{--<input type="text" class="form-control" name="search" placeholder="{{ __('messages.search') }}..." value="{{ request('search') }}">--}}

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
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('messages.books') }}
                            </span>

                            <div class="float-right">
                                @if($from && $to)
                                <a class="btn btn-sm btn-primary " target="__blank"
                                   href="{{ route('books.exportInventarAllByFromTo',Request::all()) }}"><i
                                            class="fa fa-fw fa-print"></i> {{ __('messages.download') }}</a>
                                    @endif
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
                                    <th>Id</th>
                                    <th>{{ __('messages.title') }}</th>
                                    <th>{{ __('messages.qr_number') }}</th>
                                    <th>{{ __('messages.status') }}</th>
                                    <th>{{ __('messages.is_deleted') }}</th>
                                    <th>{{ __('messages.comment') }}</th>
                                    <th>{{ __('messages.photo') }}</th>
                                    <th>{{ __('messages.actions') }}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if ($inventars->count()>0)
                                    @foreach ($inventars as $item)
                                        <tr>
                                            <td>{{$item->id}}</td> 
                                            <td>{{App\Models\Book::GetBookById($item->book_id)->title}}</td>
                                            <td>{{ $item->invertar_number }}</td>
                                            <td>{!! ($item->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                            <td>{!! ($item->is_deleted==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                            <td>{{ $item->comment }}</td>
                                            <td class="qr_code_list" style="display: block">
                                                <div>
                                                    <img src="data:image/png;base64,{{$item->qr_img}}"
                                                         alt="{{$item->invertar_number}}"
                                                         style="width: 150px;height: 150px;">
                                                </div>
                                                <center>{{$item->invertar_number}}</center>
                                            </td>
                                            <td>
                                                @if($item->status)
                                                    <button data-toggle="modal" data-target="#orderModal"
                                                            class="btn btn-danger btn-sm inventar"
                                                            data-id="{{$item->id}}">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        {{ __('messages.delete') }}
                                                    </button>
                                                    <br>
                                                @endif
                                                <a class="btn btn-sm btn-primary " href="{{ route('books.show',$item->book_id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.view') }}</a>

                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('books.exportInventar',$item->id) }}"><i
                                                            class="fa fa-fw fa-download"></i> {{ __('messages.download') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($inventars->count()>0)
                    {!! $inventars->appends(Request::all())->links() !!}
                @endif
                <div class="modal fade" id="orderModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="header_title"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('books.deleteInventar') }}" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="inventar_id" name="inventar_id">
                                    <div class="form-group">
                                        <label for="comment">{{ __('messages.comment') }}</label>
                                        <textarea name="comment" id="comment" cols="10" rows="5"
                                                  class="form-control"></textarea>
                                        @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">{{ __('messages.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-primary">{{ __('messages.save') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
    </div>
</x-admin-layout>
@push('scripts')
@endpush