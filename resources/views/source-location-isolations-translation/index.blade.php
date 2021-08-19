@extends('layouts.app')

@section('template_title')
    Source Location Isolations Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Source Location Isolations Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('source-location-isolations-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Source Location Isolations Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sourceLocationIsolationsTranslations as $sourceLocationIsolationsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sourceLocationIsolationsTranslation->locale }}</td>
											<td>{{ $sourceLocationIsolationsTranslation->source_location_isolations_id }}</td>
											<td>{{ $sourceLocationIsolationsTranslation->title }}</td>
											<td>{{ $sourceLocationIsolationsTranslation->slug }}</td>
											<td>{{ $sourceLocationIsolationsTranslation->body }}</td>
											<td>{{ $sourceLocationIsolationsTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('source-location-isolations-translations.destroy',$sourceLocationIsolationsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('source-location-isolations-translations.show',$sourceLocationIsolationsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('source-location-isolations-translations.edit',$sourceLocationIsolationsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $sourceLocationIsolationsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
