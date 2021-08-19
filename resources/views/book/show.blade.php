<x-admin-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.books') }}</h1>
                </div>
                {{--<!-- /.col -->--}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/books') }}">{{ __('messages.books') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/books/inventars') }}">{{ __('messages.inventars') }}</a></li>
                        <li class="breadcrumb-item active">{{ $book->title }}</li>
                    </ol>
                </div>
                {{--<!-- /.col -->--}}
            </div>
            {{--<!-- /.row -->--}}
        </div>
        {{--<!-- /.container-fluid -->--}}
    </div>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.view') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('books.index') }}"> {{ __('messages.back') }}</a>
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
                                <tr>
                                    <th>{{ __('messages.title') }}:</th>
                                    <td>{{$book->title}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.author') }}:</th>
                                    <td>{{$book->author}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.city') }}:</th>
                                    <td>{{$book->city}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.publisher') }}:</th>
                                    <td>{{$book->publisher}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.UDK') }}:</th>
                                    <td>{{$book->UDK}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.isbn') }}:</th>
                                    <td>{{$book->isbn}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.status') }}:</th>
                                    <td>{!! ($book->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.exists_electron_format') }}:</th>
                                    <td>{!! ($book->exists_electron_format==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.exists_in_library') }}:</th>
                                    <td>{!! ($book->exists_in_library==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.photo') }}:</th>
                                    <td>
                                        @if ($book->image)
                                            <img src="{{ asset('/storage/books/coverage/'.$book->image) }}"
                                                 width="100px">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.full_text') }}:</th>
                                    <td>
                                        @if ($book->full_text)

                                            <a href="{{ asset('/storage/books/fulltext/'.$book->full_text) }}">{{$book->title}}</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.description') }}:</th>
                                    <td>{{$book->description}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.published_year') }}:</th>
                                    <td>{{$book->published_year}}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('messages.betlar_soni') }}:</th>
                                    <td>{{$book->betlar_soni}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.price') }}:</th>
                                    <td>{{$book->price}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.book_text_types') }}:</th>
                                    <td>{{App\Models\BookTextType::GetById($book->book_text_type_id)->name}}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.book_types') }}:</th>
                                    <td>{{App\Models\BookType::GetById($book->book_type_id)->name}} </td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.book_languages') }}:</th>
                                    <td>{{App\Models\BookLanguage::GetById($book->book_language_id)->name}} </td>
                                </tr>
                                <tr>
                                    <th>{{ __('messages.book_texts') }}:</th>
                                    <td>{{App\Models\BookText::GetById($book->book_text_id)->name}} </td>
                                </tr>
                            </table>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>{{ __('messages.faculties') }}</th>
                                    <th>{{ __('messages.arrived_year') }}</th>
                                    <th>{{ __('messages.summarka_number') }}</th>
                                    <th>{{ __('messages.faculty_code') }}</th>
                                    <th>{{ __('messages.copies') }}</th>
                                </tr>
                                @if ($bookInventars->count()>0)
                                    @php
                                        $total=0;
                                    @endphp
                                    @foreach ($bookInventars as $item)
                                        @php

                                            $total +=$item->copies
                                        @endphp
                                        <tr>
                                            <td>{{App\Models\Faculty::GetById($item->faculty_id)->name}}</td>
                                            <td>{{$item->arrived_year}}</td>
                                            <td>{{$item->summarka_number}}</td>
                                            <td>{{$item->faculty_code}}</td>
                                            <td>{{$item->copies}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Jami:</b></td>
                                        <td>{{$total}}</td>
                                    </tr>
                                @endif
                            </table>


                            @if($add_inventars_mode)
                                <form method="POST" action="{{ route('books.StoreInvertar') }}" role="form"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{$book->id}}">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($faculties->count()>0)
                                                    <div class="form-group">
                                                        {!! Form::label('faculties', __('messages.faculties')) !!}
                                                        {!! Form::select('faculty_id', $faculties, ($book->bookTextType)?$book->bookTextType->id:null, ['class'=>"border shadow p-2 bg-white"]); !!}
                                                        @error('faculty_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label(__('messages.arrived_year') ) }}
                                                    {{ Form::number('arrived_year', $book->arrived_year, ['class' => 'form-control' . ($errors->has('arrived_year') ? ' is-invalid' : ''), 'placeholder' =>  __('messages.arrived_year') ]) }}
                                                    @error('arrived_year')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label(__('messages.summarka_number') ) }}
                                                    {{ Form::number('summarka_number', $book->summarka_number, ['class' => 'form-control' . ($errors->has('summarka_number') ? ' is-invalid' : ''), 'placeholder' =>  __('messages.summarka_number') ]) }}
                                                    @error('summarka_number')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label(__('messages.copies') ) }}
                                                    {{ Form::number('copies', $book->copies, ['class' => 'form-control' . ($errors->has('copies') ? ' is-invalid' : ''), 'placeholder' => __('messages.copies') ]) }}
                                                    @error('copies')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button class="btn btn-primary  pull-right"
                                                type="submit"
                                                wire:click.prevent="store()">{{ __('messages.save') }}
                                        </button>
                                    </div>
                                </form>
                            @endif
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>{{ __('messages.bibliographic_record') }}:</th>
                                </tr>
                                <tr>
                                    <td>
                                        @php
                                            $bibliographicdata='';
                                            if($book->author){
                                                $bibliographicdata.= '<b>'. $book->author.'</b><br>';
                                            }
                                            if($book->title){
                                                $bibliographicdata.= $book->title.'. ';
                                            }
                                            if($book->city){
                                                $bibliographicdata.='<span class="dashes">-</span>'.strtoupper(substr($book->city, 0, 1)).'.:';
                                            }
                                            if($book->publisher){
                                                $bibliographicdata.= ' '.$book->publisher.', '.($book->published_year)??$book->published_year;
                                            }
                                            if($book->betlar_soni){
                                                $bibliographicdata.='. <span class="dashes">-</span>'.$book->betlar_soni.' bet.';
                                            }
                                        @endphp
                                        {!!$bibliographicdata!!}
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            @if(isset($qr_lists)&&count($qr_lists)>0)
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.qr_number') }}</th>
                                        <th>{{ __('messages.comment') }}</th>
                                        <th>{{ __('messages.photo') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="qr_code_list" style="display: block">
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary " target="__blank"
                                               href="{{ route('books.exportInventarAll',$book->id) }}"><i
                                                        class="fa fa-fw fa-print"></i> {{ __('messages.download') }}</a>
                                        </td>
                                    </tr>
                                    @foreach ($qr_lists as  $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{!! ($item->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                                            <td>{{$item->invertar_number}}</td>
                                            <td>{{$item->comment}}</td>
                                            <td class="qr_code_list" style="display: block">
                                                <div>
                                                    <img src="data:image/png;base64,{{$item->qr_img}}"
                                                         alt="{{$item->invertar_number}}"
                                                         style="width: 150px;height: 150px;">
                                                </div>
                                                <center>{{$item->invertar_number}}</center>
                                            </td>
                                            <td>
                                                @if($item->status)
                                                    <button data-toggle="modal" data-target="#orderModal"
                                                            class="btn btn-danger btn-sm inventar"
                                                            data-id="{{$item->id}}">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        {{ __('messages.delete') }}
                                                    </button>
                                                @endif
                                                <a class="btn btn-sm btn-primary "
                                                   href="{{ route('books.exportInventar',$item->id) }}"><i
                                                            class="fa fa-fw fa-download"></i> {{ __('messages.download') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            @endif

                            <div class="modal fade" id="orderModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="header_title"></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('books.deleteInventar') }}" role="form"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" id="inventar_id" name="inventar_id">
                                                <div class="form-group">
                                                    <label for="comment">{{ __('messages.comment') }}</label>
                                                    <textarea name="comment" id="comment" cols="10" rows="5"
                                                              class="form-control"></textarea>
                                                    @error('comment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">{{ __('messages.close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-primary">{{ __('messages.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
@push('scripts')

@endpush
