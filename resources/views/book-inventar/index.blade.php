@extends('layouts.app')

@section('template_title')
    Book Inventar
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Book Inventar') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('book-inventars.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Faculty Id</th>
										<th>Direction Id</th>
										<th>Arrived Year</th>
										<th>Summarka Number</th>
										<th>Faculty Code</th>
										<th>Copies</th>
										<th>Inventar Number Begin</th>
										<th>Inventar Number End</th>
										<th>Qr Code Lists</th>
										<th>Inventar Number Removed</th>
										<th>Book Id</th>
										<th>Created By</th>
										<th>Updated By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookInventars as $bookInventar)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bookInventar->faculty_id }}</td>
											<td>{{ $bookInventar->direction_id }}</td>
											<td>{{ $bookInventar->arrived_year }}</td>
											<td>{{ $bookInventar->summarka_number }}</td>
											<td>{{ $bookInventar->faculty_code }}</td>
											<td>{{ $bookInventar->copies }}</td>
											<td>{{ $bookInventar->inventar_number_begin }}</td>
											<td>{{ $bookInventar->inventar_number_end }}</td>
											<td>{{ $bookInventar->qr_code_lists }}</td>
											<td>{{ $bookInventar->inventar_number_removed }}</td>
											<td>{{ $bookInventar->book_id }}</td>
											<td>{{ $bookInventar->created_by }}</td>
											<td>{{ $bookInventar->updated_by }}</td>

                                            <td>
                                                <form action="{{ route('book-inventars.destroy',$bookInventar->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('book-inventars.show',$bookInventar->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('book-inventars.edit',$bookInventar->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $bookInventars->links() !!}
            </div>
        </div>
    </div>
@endsection
