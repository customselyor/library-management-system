 <div class="box box-info padding-1">
     <div class="box-body">
         <div class='row'>
             <div class="col-md-12">
                 @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
             </div>
         </div>
         <div class="row">

             <div class="col-md-6">
                 <div class="form-group">
                     {{ Form::label(__('messages.title')) }}
                     {{ Form::text('title', $book->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('messages.title')]) }}
                     @error('title')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     {{ Form::label(__('messages.author')) }}
                     {{ Form::text('author', $book->author, ['class' => 'form-control' . ($errors->has('author') ? ' is-invalid' : ''), 'placeholder' => __('messages.author')]) }}
                     @error('author')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     {{ Form::label(__('messages.city')) }}
                     {{ Form::text('city', $book->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => __('messages.city'), 'id' => __('messages.city')]) }}
                     @error('city')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     {{ Form::label(__('messages.publisher')) }}
                     {{ Form::text('publisher', $book->publisher, ['class' => 'form-control' . ($errors->has('publisher') ? ' is-invalid' : ''), 'placeholder' => __('messages.publisher')]) }}
                     {!! $errors->first('publisher', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-2">
                 <div class="form-group">
                     {{ Form::label(__('messages.UDK')) }}
                     {{ Form::text('UDK', $book->UDK, ['class' => 'form-control' . ($errors->has('UDK') ? ' is-invalid' : ''), 'placeholder' => __('messages.UDK')]) }}
                     {!! $errors->first('UDK', '<div class="invalid-feedback">:message</div>') !!}

                 </div>
             </div>
             <div class="col-md-3">

                 <div class="form-group">
                     {{ Form::label(__('messages.isbn')) }}
                     {{ Form::text('isbn', $book->isbn, ['class' => 'form-control' . ($errors->has('isbn') ? ' is-invalid' : ''), 'placeholder' => __('messages.isbn')]) }}
                     {!! $errors->first('isbn', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label for="photo">{{ __('messages.photo') }}:</label>

                     <input type="file" name="file" class='form-control' />
                     @if ($book->image)
                         <img src="{{ asset('/storage/books/coverage/' . $book->image) }}" width="100px">
                     @endif
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     <label for="full_text">{{ __('messages.full_text') }}:</label>
                     <input type="file" name="full_text" class='form-control' id="full_text" />
                     {{-- @if ($book->full_text)
                        <img src="{{ asset('/storage/books/coverage/'.$book->image) }}" width="100px">
                    @endif --}}
                     @error('full_text')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
         </div>

         <div class="form-group">
             {{ Form::label(__('messages.description')) }}
             {{ Form::textarea('description', $book->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('messages.description'), 'rows' => 4]) }}
             {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
         </div>

         <div class="row">
             <div class="col-md-3">
                 <div class="form-group">
                     {{ Form::label(__('messages.published_year')) }}
                     {{ Form::number('published_year', $book->published_year, ['class' => 'form-control' . ($errors->has('published_year') ? ' is-invalid' : ''), 'placeholder' => __('messages.published_year')]) }}
                     @error('published_year')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
             @if (!$update_mode)
                 <div class="col-md-3">
                     <div class="form-group">
                         {{ Form::label(__('messages.arrived_year')) }}
                         {{ Form::number('arrived_year', $book->arrived_year, ['class' => 'form-control' . ($errors->has('arrived_year') ? ' is-invalid' : ''), 'placeholder' => __('messages.arrived_year')]) }}
                         @error('arrived_year')
                             <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="form-group">
                         {{ Form::label(__('messages.summarka_number')) }}
                         {{ Form::number('summarka_number', $book->summarka_number, ['class' => 'form-control' . ($errors->has('summarka_number') ? ' is-invalid' : ''), 'placeholder' => __('messages.summarka_number')]) }}
                         @error('summarka_number')
                             <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
             @endif
             <div class="col-md-3">
                 <div class="form-group">
                     {{ Form::label(__('messages.betlar_soni')) }}
                     {{ Form::number('betlar_soni', $book->betlar_soni, ['class' => 'form-control' . ($errors->has('betlar_soni') ? ' is-invalid' : ''), 'placeholder' => __('messages.betlar_soni')]) }}
                     @error('betlar_soni')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-3">
                 <div class="form-group">
                     {{ Form::label(__('messages.price')) }}
                     {{ Form::number('price', $book->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => __('messages.price')]) }}
                     @error('price')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                     @php
                         $exists_electron_format = 0;
                     @endphp
                     @if ($book->count() > 0)
                         @php
                             $exists_electron_format = $book->exists_electron_format;
                         @endphp
                     @endif
                     <div class="form-group">
                         <label for="exists_electron_format">{{ __('messages.exists_electron_format') }}</label>
                         <select class="form-control" id="exists_electron_format" name="exists_electron_format">
                             <option value='0' {{ $exists_electron_format ? '' : 'selected' }}>
                                 {{ __('messages.no') }}
                             </option>
                             <option value='1' {{ $exists_electron_format ? 'selected' : '' }}>
                                 {{ __('messages.yes') }}</option>
                         </select>
                         @error('exists_electron_format')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">

                     @php
                         $exists_in_library_def = 1;
                     @endphp
                     @if ($book->count() > 0)
                         @php
                             
                             $exists_in_library_def = $book->exists_in_library;
                         @endphp
                     @endif
                     <div class="form-group">
                         <label for="exists_in_library">{{ __('messages.exists_in_library') }}</label>
                         <select class="form-control" id="exists_in_library" name="exists_in_library">
                             <option value='0' {{ $exists_in_library_def ? '' : 'selected' }}>
                                 {{ __('messages.no') }}
                             </option>
                             <option value='1' {{ $exists_in_library_def ? 'selected' : '' }}>
                                 {{ __('messages.yes') }}
                             </option>
                         </select>
                         @error('exists_in_library')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-3">
                 @if (count($book_text_types) > 0)
                     <div class="form-group">
                         {!! Form::label('book_text_types', __('messages.book_text_types')) !!}
                         {!! Form::select('book_text_type_id', $book_text_types, $book->bookTextType ? $book->bookTextType->id : null, ['class' => 'border  p-2 bg-white']) !!}
                         @error('book_text_type_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 @endif
             </div>
             <div class="col-md-3">
                 @if ($book_types->count() > 0)
                     <div class="form-group">
                         {!! Form::label('book_types', __('messages.book_types')) !!}
                         {!! Form::select('book_type_id', $book_types, $book->bookType ? $book->bookType->id : null, ['class' => 'border  p-2 bg-white']) !!}

                         @error('book_type_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 @endif
             </div>
             <div class="col-md-3">
                 @if ($book_languages->count() > 0)
                     <div class="form-group">

                         {!! Form::label('book_languages', __('messages.book_languages')) !!}
                         {!! Form::select('book_language_id', $book_languages, $book->bookLanguage ? $book->bookLanguage->id : null, ['class' => 'border  p-2 bg-white']) !!}

                         @error('book_language_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror

                     </div>
                 @endif
             </div>
             <div class="col-md-3">
                 @if ($book_texts->count() > 0)
                     <div class="form-group">

                         {!! Form::label('book_texts', __('messages.book_texts')) !!}
                         {!! Form::select('book_text_id', $book_texts, $book->bookText ? $book->bookText->id : null, ['class' => 'border  p-2 bg-white']) !!}

                         @error('book_text_id')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror

                     </div>
                 @endif
             </div>
         </div>

         @if ($update_mode)
             <div class="row">
                 <table class="table table-striped table-hover">
                     <tr>
                         <th>{{ __('messages.faculties') }}</th>
                         <th>{{ __('messages.arrived_year') }}</th>
                         <th>{{ __('messages.summarka_number') }}</th>
                         <th>{{ __('messages.faculty_code') }}</th>
                         <th>{{ __('messages.copies') }}</th>
                     </tr>
                     @if ($bookInventars->count() > 0)
                         @php
                             $total = 0;
                         @endphp
                         @foreach ($bookInventars as $item)
                             @php
                                 $total += $item->copies;
                             @endphp
                             <tr>
                                 <td>{{ App\Models\Faculty::GetById($item->faculty_id)->name }}</td>
                                 <td>{{ $item->arrived_year }}</td>
                                 <td>{{ $item->summarka_number }}</td>
                                 <td>{{ $item->faculty_code }}</td>
                                 <td>{{ $item->copies }}</td>
                             </tr>
                         @endforeach
                         <tr>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td><b>{{ __('messages.total') }}:</b></td>
                             <td>{{ $total }}</td>
                         </tr>
                     @endif
                 </table>
             </div>
         @else
             <div class="row">
                 <div class="col-md-6">
                     @if ($faculties->count() > 0)
                         <div class="form-group">
                             {!! Form::label('faculties', __('messages.faculties')) !!} <br>
                             {!! Form::select('faculty_id', $faculties, $book->bookTextType ? $book->bookTextType->id : null, ['class' => 'border  p-2 bg-white']) !!}
                             @error('faculty_id')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                     @endif
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         {{ Form::label(__('messages.copies')) }}
                         {{ Form::number('copies', $book->copies, ['class' => 'form-control' . ($errors->has('copies') ? ' is-invalid' : ''), 'placeholder' => __('messages.copies')]) }}
                         @error('copies')
                             <span class="invalid-feedback">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
             </div>
         @endif
     </div>
     <!-- /.box-body -->
     <div class="box-footer">
         <button class="btn btn-primary  pull-right" type="submit" id="book_Submit">{{ __('messages.save') }}
         </button>

         @if (isset($qr_lists) && count($qr_lists) > 0)
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
                             href="{{ route('books.exportInventarAll', $book->id) }}"><i
                                 class="fa fa-fw fa-print"></i> {{ __('messages.download') }}</a>
                     </td>
                 </tr>
                 @foreach ($qr_lists as $key => $item)
                     <tr>
                         <td>{{ $key + 1 }}</td>
                         <td>{!! $item->status == 1 ? '<i class="far fa-check-circle text-success"></i>' : '<i class="far fa-times-circle text-danger"></i>' !!}</td>
                         <td>{{ $item->invertar_number }}</td>
                         <td>{{ $item->comment }}</td>
                         <td class="qr_code_list" style="display: block">
                             <div>
                                 <img src="data:image/png;base64,{{ $item->qr_img }}"
                                     alt="{{ $item->invertar_number }}" style="width: 150px;height: 150px;">
                             </div>
                             <center>{{ $item->invertar_number }}</center>
                         </td>
                         <td>
                             <button wire:click="destroyInventar({{ $item->id }})" class="btn btn-danger btn-sm">
                                 <i class="fa fa-fw fa-trash"></i>
                                 {{ __('messages.delete') }}
                             </button>
                             <a class="btn btn-sm btn-primary "
                                 href="{{ route('books.exportInventar', $item->id) }}"><i
                                     class="fa fa-fw fa-download"></i> {{ __('messages.download') }}</a>
                         </td>
                     </tr>
                 @endforeach
             </table>
         @endif
     </div>
 </div>
