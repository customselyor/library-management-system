@extends('layouts.app')

@section('template_title')
    Page
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Page') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Key</th>
										<th>Image</th>
										<th>Is Favorite</th>
										<th>Status</th>
										<th>Hits Count</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Category Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $page->key }}</td>
											<td>{{ $page->image }}</td>
											<td>{{ $page->is_favorite }}</td>
											<td>{{ $page->status }}</td>
											<td>{{ $page->hits_count }}</td>
											<td>{{ $page->created_by }}</td>
											<td>{{ $page->updated_by }}</td>
											<td>{{ $page->category_id }}</td>

                                            <td>
                                                <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pages.show',$page->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pages.edit',$page->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pages->links() !!}
            </div>
        </div>
    </div>
@endsection
