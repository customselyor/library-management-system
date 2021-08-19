<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID:</th>
                <td>{{$book_id}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.title') }}:</th>
                <td>{{$title}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.author') }}:</th>
                <td>{{$author}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.city') }}:</th>
                <td>{{$city}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.publisher') }}:</th>
                <td>{{$publisher}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.UDK') }}:</th>
                <td>{{$UDK}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.isbn') }}:</th>
                <td>{{$isbn}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.photo') }}:</th>
                <td>
                    @if($old_image)
                        <img src="{{ asset('/storage/'.$old_image) }}" width="100px">
                    @endif
                </td>
            </tr>
            <tr>
                <th>{{ __('messages.description') }}:</th>
                <td>{{$description}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.published_year') }}:</th>
                <td>{{$published_year}}</td>
            </tr>
              
            <tr>
                <th>{{ __('messages.betlar_soni') }}:</th>
                <td>{{$betlar_soni}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.book_text_types') }}:</th>
                <td>{{App\Models\BookTextType::GetById($book_text_type_id)->name}}</td>
            </tr>
            <tr>
                <th>{{ __('messages.book_types') }}:</th>
                <td>{{App\Models\BookType::GetById($book_type_id)->name}} </td>
            </tr>
            <tr>
                <th>{{ __('messages.book_languages') }}:</th>
                <td>{{App\Models\BookLanguage::GetById($book_language_id)->name}} </td>
            </tr>
            <tr>
                <th>{{ __('messages.book_texts') }}:</th>
                <td>{{App\Models\BookText::GetById($book_text_id)->name}} </td>
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
        


        @if($is_add_invertar_mode)
        
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
                <div class="col-md-6">
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
                
            </div>
            <div class="row">
                <div class="col-md-6">
                      
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

                <div class="col-md-6">
                   
                    <div class="form-group">
                      <label class="required" for="copies">{{ __('messages.copies') }}:</label>  
                      <input type="number" class="form-control" wire:model="copies" placeholder="{{ __('messages.copies') }}" id="copies">
                        @error('copies') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    
                    
                </div>
            </div>
          </div>
          <div class="box-footer">
            <button class="btn btn-primary  pull-right"
                    type="submit"
                    wire:click.prevent="UpdateAddInvertar()">{{ __('messages.save') }}
            </button>
          </div>
          <br>
        @endif
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
        <hr>
        
        
        @if($qr_lists)
            <table class="table table-striped table-hover">
                <tr>
                    <th>Id</th> 
                    <th>{{ __('messages.status') }}</th> 
                    <th>{{ __('messages.qr_number') }}</th>
                     <th>{{ __('messages.comment') }}</th>
                    <th>{{ __('messages.photo') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
                @foreach ($qr_lists as  $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{!! ($item->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}</td>
                    <td>{{$item->invertar_number}}</td>
                    <td>{{$item->comment}}</td>
                    <td class="qr_code_list" style="display: block">
                        <div >
                            <img src="data:image/png;base64,{{$item->qr_img}}" alt="{{$item->invertar_number}}" style="width: 150px;height: 150px;">
                        </div>
                        <center>{{$item->invertar_number}}</center>
                    </td>
                    <td>
                        <button wire:click="destroyInventar({{$item->id}})" class="btn btn-danger btn-sm">
                            <i class="fa fa-fw fa-trash"></i>
                            {{ __('messages.delete') }}
                        </button>
                        <button wire:click="export({{$item->id}})" class="btn btn-primary btn-sm">
                            {{ __('messages.download') }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </table> 
        @endif        
    </div>
</div>


