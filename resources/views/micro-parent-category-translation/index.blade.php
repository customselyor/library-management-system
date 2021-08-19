@extends('layouts.app')

@section('template_title')
    Micro Parent Category Translation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Micro Parent Category Translation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('micro-parent-category-translations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Micro Parent Category Id</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Body</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($microParentCategoryTranslations as $microParentCategoryTranslation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $microParentCategoryTranslation->locale }}</td>
											<td>{{ $microParentCategoryTranslation->micro_parent_category_id }}</td>
											<td>{{ $microParentCategoryTranslation->title }}</td>
											<td>{{ $microParentCategoryTranslation->slug }}</td>
											<td>{{ $microParentCategoryTranslation->body }}</td>
											<td>{{ $microParentCategoryTranslation->description }}</td>

                                            <td>
                                                <form action="{{ route('micro-parent-category-translations.destroy',$microParentCategoryTranslation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('micro-parent-category-translations.show',$microParentCategoryTranslation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('micro-parent-category-translations.edit',$microParentCategoryTranslation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $microParentCategoryTranslations->links() !!}
            </div>
        </div>
    </div>
@endsection
