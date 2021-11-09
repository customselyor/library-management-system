<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.books') }}</h1>
                </div>
                {{-- <!-- /.col --> --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.books') }}</li>
                    </ol>
                </div>
                {{-- <!-- /.col --> --}}
            </div>
            {{-- <!-- /.row --> --}}
        </div>
        {{-- <!-- /.container-fluid --> --}}
    </div>
    {{-- <!-- /.content-header --> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('messages.books') }}
                            </span>
                            <form action="{{ route('books.index') }}" method="GET" accept-charset="UTF-8"
                                class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="{{ __('messages.search') }}..."
                                        value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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
                                        <th>Id</th>
                                        <th>{{ __('messages.isbn') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.title') }}</th>
                                        <th>{{ __('messages.author') }}</th>
                                        <th>{{ __('messages.UDK') }}</th>
                                        <th>{{ __('messages.published_year') }}</th>
                                        <th>{{ __('messages.photo') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($books->count() > 0)
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $book->id }}</td> 
                                                <td>{{ $book->isbn }}</td>
                                                <td>{!! $book->status == 1 ? '<i class="far fa-check-circle text-success"></i>' : '<i class="far fa-times-circle text-danger"></i>' !!}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->UDK }}</td>
                                                <td>{{ $book->published_year }}</td>
                                                <td>
                                                    @if ($book->image)
                                                        <img src="{{ asset('/storage/books/coverage/' . $book->image) }}"
                                                            width="100px">
                                                        {{-- <img src="{{url('/storage/app/public/'.$book->image)}}" alt="" width="100%"> --}}
                                                    @endif
                                                </td>

                                                <td>
                                                    <form action="{{ route('books.destroy', $book->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('books.show', $book->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i>
                                                            {{ __('messages.view') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('books.edit', $book->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i>
                                                            {{ __('messages.edit') }}</a>
                                                        <br>
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('books.addInvertar', $book->id) }}"><i
                                                                class="fa fa-fw fa-plus"></i>
                                                            {{ __('messages.add') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                            {{ __('messages.delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($books->count() > 0)
                    {!! $books->appends(Request::all())->links() !!}
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
@push('scripts')
@endpush
