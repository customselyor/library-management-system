<x-admin-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Language Setting') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('language-settings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
                                        <th>{{ __('messages.code') }}</th>
                                        <th>{{ __('messages.title') }}</th>
                                        <th>{{ __('messages.status') }}</th>
										<th>Set As Default</th>
										<th>Icon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($languageSettings as $languageSetting)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $languageSetting->code }}</td>
											<td>{{ $languageSetting->title }}</td>
                                            <td>{!! ($languageSetting->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                            <td>{!! ($languageSetting->set_as_default==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                            <td>{{ $languageSetting->icon }}</td>
                                            <td>
                                                <form action="{{ route('language-settings.destroy',$languageSetting->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('language-settings.show',$languageSetting->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('language-settings.edit',$languageSetting->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $languageSettings->links() !!}
            </div>
        </div>
    </div>
</x-admin-layout>