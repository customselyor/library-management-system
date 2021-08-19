@extends('layouts.app')

@section('template_title')
    Conditions Growths Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Conditions Growths Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('conditions-growths-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Conditions Growths Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conditionsGrowthsTranslations as $conditionsGrowthsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $conditionsGrowthsTranslation->locale }}</td>
											<td>{{ $conditionsGrowthsTranslation->conditions_growths_id }}</td>
											<td>{{ $conditionsGrowthsTranslation->title }}</td>
											<td>{{ $conditionsGrowthsTranslation->slug }}</td>
											<td>{{ $conditionsGrowthsTranslation->body }}</td>
											<td>{{ $conditionsGrowthsTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('conditions-growths-translations.destroy',$conditionsGrowthsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('conditions-growths-translations.show',$conditionsGrowthsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('conditions-growths-translations.edit',$conditionsGrowthsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $conditionsGrowthsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
