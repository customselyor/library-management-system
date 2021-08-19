<div class="card-body">
    <div class="col-12">
      <div class="box box-info">
          <x-loading-indicator/>

            <!-- form start -->
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required" for="title">{{ __('messages.title') }}:</label>
                      <input
                        type="text"
                        class="form-control  {{ $errors->has($title) ? 'is-invalid' : '' }}"
                        name="title"
                        id="title"
                        wire:model="title"
                        placeholder="{{ __('messages.title') }}"
                      />
                      @error('title') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required" for="author">{{ __('messages.author') }}:</label>
                      <input
                        type="text"
                        class="form-control  {{ $errors->has($author) ? 'is-invalid' : '' }}"
                        name="author"
                        id="author"
                        wire:model="author"
                        placeholder="{{ __('messages.author') }}"
                      />
                      @error('author') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>    
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required" for="city">{{ __('messages.city') }}:</label>
                      <input
                        type="text"
                        class="form-control  {{ $errors->has($city) ? 'is-invalid' : '' }}"
                        name="city"
                        id="city"
                        wire:model="city"
                        placeholder="{{ __('messages.city') }}"
                      />
                      @error('city') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required" for="publisher">{{ __('messages.publisher') }}:</label>
                      <input
                        type="text"
                        class="form-control  {{ $errors->has($publisher) ? 'is-invalid' : '' }}"
                        name="publisher"
                        id="publisher"
                        wire:model="publisher"
                        placeholder="{{ __('messages.publisher') }}"
                      />
                      @error('publisher') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="required" for="UDK">{{ __('messages.UDK') }}:</label>  
                      <input type="number" class="form-control" wire:model="UDK" placeholder="{{ __('messages.UDK') }}" id="UDK">
                        @error('UDK') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    
                    <div class="form-group">
                      <label class="required" for="isbn">{{ __('messages.isbn') }}:</label>
                      <input
                        type="text"
                        class="form-control  {{ $errors->has($isbn) ? 'is-invalid' : '' }}"
                        name="isbn"
                        id="isbn"
                        wire:model="isbn"
                        placeholder="{{ __('messages.isbn') }}"
                      />
                      @error('isbn') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="photo">{{ __('messages.photo') }}:</label>  
                      <br>
                      <input type="file" wire:model="photo" id="photo">
                       @if ($photo && !$updateMode)
                       <br>
                          Photo Preview:
                          <img src="{{ $photo->temporaryUrl() }}" width="100px">
                      @endif
                      @if($old_image && $photo==null)
                          <img src="{{ asset('/storage/'.$old_image) }}" width="100px">
                      @endif
                      @error('photo') <span class="error">{{ $message }}</span> @enderror
                      <div wire:loading wire:target="photo" class="mx-auto text-xs">Uploading...</div>
    
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label class="required" for="description">{{ __('messages.description') }}:</label>
                  <textarea name="description"
                  id="description"
                  wire:model="description"
                  class="form-control" rows="3"></textarea>
                  
                  @error('description') 
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                
                
                
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                   
                      <label class="required" for="published_year">{{ __('messages.published_year') }}:</label>
                      
                      {{-- <select name="published_year" wire:model="published_year" class="border shadow p-2 bg-white select2 w-100">
                              @foreach($years as $v)
                                  <option value={{ $v }}>{{ $v}}</option>
                              @endforeach
                          </select> --}}
                      <input
                        type="number"
                        class="form-control  {{ $errors->has($published_year) ? 'is-invalid' : '' }}"
                        name="published_year"
                        id="published_year"
                        wire:model="published_year"
                        placeholder="{{ __('messages.published_year') }}"
                      />
                      @error('published_year') 
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                  @if (!$is_update_mode)                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="required" for="arrived_year">{{ __('messages.arrived_year') }}:</label>
                      <input
                        type="number"
                        class="form-control  {{ $errors->has($arrived_year) ? 'is-invalid' : '' }}"
                        name="arrived_year"
                        id="arrived_year"
                        wire:model="arrived_year"
                        placeholder="{{ __('messages.arrived_year') }}"
                      />
                      @error('arrived_year')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="required" for="summarka_number">{{ __('messages.summarka_number') }}:</label>
                      <input
                        type="number"
                        class="form-control  {{ $errors->has($summarka_number) ? 'is-invalid' : '' }}"
                        name="summarka_number"
                        id="summarka_number"
                        wire:model="summarka_number"
                        placeholder="{{ __('messages.summarka_number') }}"
                      />
                      @error('summarka_number')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                 
                  @endif
                  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="required" for="betlar_soni">{{ __('messages.betlar_soni') }}:</label>  
                      <input type="number" class="form-control" wire:model="betlar_soni" placeholder="{{ __('messages.betlar_soni') }}" id="betlar_soni">
                        @error('betlar_soni') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                      @if($book_text_types->count()>0)
                      <div class="form-group">
                          <label class="inline-block w-32 font-bold">{{ __('messages.book_text_types') }}:</label>
                          <select name="book_text_types" wire:model="book_text_type_id"
                                  class="border shadow p-2 bg-white">
                              <option value=''>{{ __('messages.choose') }}</option>
                              @foreach($book_text_types as $v)
                                  <option value={{ $v->id }}>{{ $v->name}}</option>
                              @endforeach
                          </select>
                          <br>
                          @error('book_text_type_id') <span
                                  class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    @endif
                    </div>
                    <div class="col-md-3">
                      @if($book_types->count()>0)
                      <div class="form-group">
                          <label class="inline-block w-32 font-bold">{{ __('messages.book_types') }}:</label>
                          <select name="book_type" wire:model="book_type_id"
                                  class="border shadow p-2 bg-white">
                              <option value=''>{{ __('messages.choose') }}</option>
                              @foreach($book_types as $v)
                                  <option value={{ $v->id }}>{{ $v->name}}</option>
                              @endforeach
                          </select>
                          <br>
                          @error('book_type_id') <span
                                  class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    @endif       
                    </div>
                    <div class="col-md-3">
                      @if($book_languages->count()>0)
                      <div class="form-group">
                          <label class="inline-block w-32 font-bold">{{ __('messages.book_languages') }}:</label>
                          <select name="book_type" wire:model="book_language_id"
                                  class="border shadow p-2 bg-white">
                              <option value=''>{{ __('messages.choose') }}</option>
                              @foreach($book_languages as $v)
                                  <option value={{ $v->id }}>{{ $v->name}}</option>
                              @endforeach
                          </select>
                          <br>
                          @error('book_language_id') <span
                                  class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    @endif
                    </div>
                    <div class="col-md-3">
                      @if($book_texts->count()>0)
                      <div class="form-group">
                          <label class="inline-block w-32 font-bold">{{ __('messages.book_texts') }}:</label>
                          <select name="book_type" wire:model="book_text_id"
                                  class="border shadow p-2 bg-white">
                              <option value=''>{{ __('messages.choose') }}</option>
                              @foreach($book_texts as $v)
                                  <option value={{ $v->id }}>{{ $v->name}}</option>
                              @endforeach
                          </select>
                          <br>
                          @error('book_text_id') <span
                                  class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    @endif
    
                    </div>
                </div>
                
                @if ($is_update_mode)
                <div class=" add-input">
                  <div class="row">
                    <table class="table table-striped table-hover">
                      <tr>
                          <th>{{ __('messages.faculties') }}</th>
                          <th>{{ __('messages.arrived_year') }}</th>
                          <th>{{ __('messages.summarka_number') }}</th>
                          <th>{{ __('messages.faculty_code') }}</th>
                          <th>{{ __('messages.copies') }}</th>
                      </tr>
                      @if ($bookInventars->count()>0)
                          @foreach ($bookInventars as $item)
                              <tr>
                                  <td>{{App\Models\Faculty::GetById($item->faculty_id)->name}}</td>
                                  <td>{{$item->arrived_year}}</td>
                                  <td>{{$item->summarka_number}}</td>
                                  <td>{{$item->faculty_code}}</td>
                                  <td>{{$item->copies}}</td> 
                              </tr>                    
                          @endforeach
                      @endif
                  </table>
                  
                  </div>
                </div>
                @else
                <div class=" add-input">
                  <div class="row">
                      <div class="col-md-6">
                        @if($faculties->count()>0)
                         
                          <div class="form-group">
                              <label class="inline-block w-32 font-bold">{{ __('messages.faculties') }}:</label>
                              <select name="faculty_id" wire:model="faculty_id" class="border shadow p-2 bg-white ">
                                <option value=''>{{ __('messages.choose') }}</option>
                                @foreach($faculties as $v)
                                  <option value={{ $v->id }}>{{ $v->name}}</option>
                                @endforeach
                              </select>
                              <br>
                              @error('faculty_id') 
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        @endif
                      </div>
                      <div class="col-md-4">
                         
                          <div class="form-group">
                            <label class="required" for="copies">{{ __('messages.copies') }}:</label>  
                            <input type="number" class="form-control" wire:model="copies" placeholder="{{ __('messages.copies') }}" id="copies">
                              @error('copies') <span class="text-danger error">{{ $message }}</span>@enderror
                          </div>
                          
                          
                      </div>
                  </div>
                </div>                    
                @endif
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-primary  pull-right"
                        type="submit"
                        wire:click.prevent="store()">{{ __('messages.save') }}
                </button>
              </div>
              <!-- /.box-footer -->
            </form>
            <br>
            <table class="table table-striped table-hover">
              <tr>
                  <th>{{ __('messages.bibliographic_record') }}:</th>
              </tr>
              <tr>
                  <td>
                      @php
                          $bibliographicdata='';
                          if($author){
                              $bibliographicdata.= '<b>'. $author.'</b><br>';
                          }
                          if($title){
                              $bibliographicdata.= $title.'. ';
                          }
                          if($city){
                              $bibliographicdata.='<span class="dashes">-</span>'.strtoupper(substr($city, 0, 1)).'.:';
                          }
                          if($publisher){
                              $bibliographicdata.= ' '.$publisher.', '.($published_year)??$published_year;
                          }
                          if($betlar_soni){
                              $bibliographicdata.='. <span class="dashes">-</span>'.$betlar_soni.' bet.';
                          }
                      @endphp
                      {!!$bibliographicdata!!}
  
                  </td>
              </tr>
            </table>
          </div>
    </div>
    
</div>

