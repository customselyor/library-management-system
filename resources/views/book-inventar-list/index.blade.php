@extends('layouts.app')

@section('template_title')
    Book Inventar List
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Book Inventar List') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('book-inventar-lists.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Invertar Number</th>
										<th>Is Deleted</th>
										<th>Comment</th>
										<th>Qr Img</th>
										<th>Status</th>
										<th>Book Id</th>
										<th>Book Inventar Id</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Extra1</th>
										<th>Extra2</th>
										<th>Extra3</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookInventarLists as $bookInventarList)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bookInventarList->invertar_number }}</td>
											<td>{{ $bookInventarList->is_deleted }}</td>
											<td>{{ $bookInventarList->comment }}</td>
											<td>{{ $bookInventarList->qr_img }}</td>
											<td>{{ $bookInventarList->status }}</td>
											<td>{{ $bookInventarList->book_id }}</td>
											<td>{{ $bookInventarList->book_inventar_id }}</td>
											<td>{{ $bookInventarList->created_by }}</td>
											<td>{{ $bookInventarList->updated_by }}</td>
											<td>{{ $bookInventarList->extra1 }}</td>
											<td>{{ $bookInventarList->extra2 }}</td>
											<td>{{ $bookInventarList->extra3 }}</td>

                                            <td>
                                                <form action="{{ route('book-inventar-lists.destroy',$bookInventarList->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('book-inventar-lists.show',$bookInventarList->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('book-inventar-lists.edit',$bookInventarList->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bookInventarLists->links() !!}
            </div>
        </div>
    </div>
@endsection
