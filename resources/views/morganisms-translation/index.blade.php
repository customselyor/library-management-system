@extends('layouts.app')

@section('template_title')
    Morganisms Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Morganisms Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('morganisms-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Morganisms Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Strain Label</th>
										<th>Enzymatic Activity Extreme Conditions Protein</th>
										<th>Characteristics Produced Compounds</th>
										<th>Pathogenicity</th>
										<th>Comments</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($morganismsTranslations as $morganismsTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $morganismsTranslation->locale }}</td>
											<td>{{ $morganismsTranslation->morganisms_id }}</td>
											<td>{{ $morganismsTranslation->title }}</td>
											<td>{{ $morganismsTranslation->slug }}</td>
											<td>{{ $morganismsTranslation->strain_label }}</td>
											<td>{{ $morganismsTranslation->enzymatic_activity_extreme_conditions_protein }}</td>
											<td>{{ $morganismsTranslation->characteristics_produced_compounds }}</td>
											<td>{{ $morganismsTranslation->pathogenicity }}</td>
											<td>{{ $morganismsTranslation->comments }}</td>
											<td>{{ $morganismsTranslation->body }}</td>
											<td>{{ $morganismsTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('morganisms-translations.destroy',$morganismsTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('morganisms-translations.show',$morganismsTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('morganisms-translations.edit',$morganismsTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $morganismsTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
