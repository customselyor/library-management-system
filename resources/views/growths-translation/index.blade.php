@extends('layouts.app')

@section('template_title')
    Growths Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Growths Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('growths-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Growths Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($growthsTranslations as $growthsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $growthsTranslation->locale }}</td>
											<td>{{ $growthsTranslation->growths_id }}</td>
											<td>{{ $growthsTranslation->title }}</td>
											<td>{{ $growthsTranslation->slug }}</td>
											<td>{{ $growthsTranslation->body }}</td>
											<td>{{ $growthsTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('growths-translations.destroy',$growthsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('growths-translations.show',$growthsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('growths-translations.edit',$growthsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $growthsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
