<div xmlns:wire="http://www.w3.org/1999/xhtml">
    {{--<!-- Content Header (Page header) -->--}}
    <div class="content-header" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml"
         xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.books') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('messages.books') }}</li>
                    </ol>
                </div>
                {{--<!-- /.col -->--}}
            </div>
            {{--<!-- /.row -->--}}
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content-header -->--}}
    {{--<!-- Main content -->--}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header notprint">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('messages.books') }}
                            </span>
                                <div class="float-right">
                                    @if($show_create | $is_view_mode)
                                        <button type="button" class="btn btn-primary" wire:click="HideCreate()">
                                            {{ __('messages.close') }}
                                        </button>
                                    @else 
                                        <button type="button" class="btn btn-primary" wire:click="ShowCreate()">
                                            {{ __('messages.create') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @if($show_create)
                            @include('livewire.admin.books.create')
                        @elseIf($is_view_mode)
                            @include('livewire.admin.books.view')
                        @else
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>Id</th> 
                                        <th>{{ __('messages.isbn') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.title') }}</th> 
                                        <th>{{ __('messages.author') }}</th> 
                                        <th>{{ __('messages.UDK') }}</th>   
                                        <th>{{ __('messages.photo') }}</th> 
                                        <th></th> 
                                    </tr>
                                    <tr>
                                        <th></th> 
                                        <th>
                                            <input
                                                type="text"
                                                class="form-control "
                                                name="s_isbn"
                                                id="s_isbn"
                                                wire:model="s_isbn"
                                                placeholder="{{ __('messages.isbn') }}"
                                            />
                                        </th>
                                        <th>
                                            <select class="form-control" wire:model="s_status">
                                                <option value=""></option>
                                                <option value="0">Faol emas</option>
                                                <option value="1">Faol</option>
                                            </select>
                                        </th>
                                        <th>
                                            <input
                                            type="text"
                                            class="form-control "
                                            name="s_title"
                                            id="s_title"
                                            wire:model="s_title"
                                            placeholder="{{ __('messages.title') }}"
                                          />    
                                        </th> 
                                        <th>
                                            {{$s_author}}
                                            <input
                                            type="text"
                                            class="form-control"
                                            name="s_author"
                                            id="s_author"
                                            wire:model="s_author"
                                            placeholder="{{ __('messages.author') }}"
                                          />    
                                        </th> 
                                        <th></th> 
                                        <th></th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->isEmpty())
                                        <tr>

                                            <th colspan="7">
                                               <center>No matching result was found.</center> 
                                            </th>
                                        </tr>
                                    @else
                                        @foreach ($data as $key => $book)
                                            <tr>
                                                <td>{{$book->id}}</td>
                                                <td>{{ $book->isbn }}</td>
                                                <td>{!! ($book->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->UDK }}</td>
                                                 <td>
                                                    @if($book->image)
                                                        <img src="{{ asset('/storage/'.$book->image) }}" width="100px">
                                                        {{-- <img src="{{url('/storage/app/public/'.$book->image)}}" alt="" width="100%"> --}}
                                                    @endif
                                                </td>
                                                <td style="width: 130px;">
                                                    <button wire:click="view({{ $book->id }})"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('messages.view') }}
                                                    </button>
                                                    <button wire:click="edit({{ $book->id }})"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('messages.edit') }}
                                                    </button>
                                                    <button wire:click="addInvertar({{ $book->id }})"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-fw fa-plus"></i> {{ __('messages.add') }}
                                                    </button>
                                                    {{-- <button wire:click="destroy({{$book->id}})"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>{{ __('messages.delete') }}
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                

                            </div>
                            {!! $data->links() !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    {{--<!-- /.content -->--}}

</div>