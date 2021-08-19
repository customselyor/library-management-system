<div class="card-body">
    @if ($app_languges->count()>0)
        <div class="row">
            <div class="col-8 col-sm-8 col-lg-8">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="language-tabs" role="tablist">
                            @foreach ($app_languges as $item)
                                <li class="nav-item">
                                    @if($current_tab == $item->code )
                                        @php $one_signal_klass='active'; @endphp
                                    @else
                                        @php $one_signal_klass=' hide'; @endphp
                                    @endif
                                    {{-- active --}}
                                    <a class="nav-link {{$one_signal_klass}}" wire:click="tabs('{{$item->code}}')" id="language-tabs-tab-{{$item->code}}" data-toggle="pill" href="#language-tabs-tab-id-{{$item->code}}" role="tab" aria-controls="language-tabs-tab-id-{{$item->code}}" aria-selected="true">{{$item->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="language-tabsContent">
                            @foreach ($app_languges as $item)
                                @if($current_tab == $item->code )
                                    @php $tab_content_class='active show'; @endphp
                                @else
                                    @php $tab_content_class=' hide'; @endphp
                                @endif

                                <div class="tab-pane fade {{$tab_content_class}}" id="language-tabs-tab-id-{{$item->code}}" role="tabpanel" aria-labelledby="language-tabs-tab-{{$item->code}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input
                                              type="text"
                                              class="form-control  "
                                              name="local_{{$item->code}}"
                                              id="local_{{$item->code}}"
                                              wire:model.defer="micro_category.local_{{$item->code}}"
                                              value="{{$item->code}}"
                                            />
                                          <div class="form-group">
                                            <label class="required" for="title_{{$item->code}}">{{ __('messages.title') }}:</label>
                                            <input
                                              type="text"
                                              class="form-control  {{ $errors->has($title) ? 'is-invalid' : '' }}"
                                              name="title_{{$item->code}}"
                                              id="title_{{$item->code}}"
                                              wire:model="micro_category.title_{{$item->code}}"
                                              placeholder="{{ __('messages.title') }}"
                                            />
                                            @error('title_{{$item->code}}') 
                                              <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                          </div>
                                        </div>
                                    </div>

                                </div>   
                            @endforeach
                        </div>
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="col-4 col-sm-4 col-lg-4">
                <div class="card card-primary card-outline">
                    <div class="box-footer">
                        <button class="btn btn-primary  pull-right"
                                type="submit"
                                wire:click.prevent="store()">{{ __('messages.save') }}
                        </button>
                      </div>
                </div>
            </div>
        </div>
    @endif
</div>