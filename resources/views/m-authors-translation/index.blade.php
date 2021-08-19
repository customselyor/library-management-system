@extends('layouts.app')

@section('template_title')
    M Authors Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('M Authors Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('m-authors-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Locale</th>
										<th>M Authors Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mAuthorsTranslations as $mAuthorsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mAuthorsTranslation->locale }}</td>
											<td>{{ $mAuthorsTranslation->m_authors_id }}</td>
											<td>{{ $mAuthorsTranslation->title }}</td>
											<td>{{ $mAuthorsTranslation->slug }}</td>
											<td>{{ $mAuthorsTranslation->body }}</td>
											<td>{{ $mAuthorsTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('m-authors-translations.destroy',$mAuthorsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('m-authors-translations.show',$mAuthorsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('m-authors-translations.edit',$mAuthorsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $mAuthorsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
