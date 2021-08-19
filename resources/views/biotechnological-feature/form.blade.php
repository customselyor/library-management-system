<div class="box box-info padding-1">
    <div class="box-body">
        @if ($app_languges->count()>0)
            <div class="row">
                <div class="col-8 col-sm-8 col-lg-8">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="language-tabs" role="tablist">
                                @foreach ($app_languges as $k => $item)
                                    <li class="nav-item">
                                        <a class="nav-link {{($k==0)?'active':''}}" id="language-tabs-tab-{{$item->code}}" data-toggle="pill" href="#language-tabs-tab-id-{{$item->code}}" role="tab" aria-controls="language-tabs-tab-id-{{$item->code}}" aria-selected="true">{{$item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="language-tabsContent">
                                @foreach ($app_languges as $k=>$item)
                                    <div class="tab-pane fade {{($k==0)?'active show':'hide'}}" id="language-tabs-tab-id-{{$item->code}}" role="tabpanel" aria-labelledby="language-tabs-tab-{{$item->code}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input
                                                        type="hidden"
                                                        class="form-control "
                                                        name="locale_{{$item->code}}"
                                                        id="locale_{{$item->code}}"
                                                        value="{{$item->code}}"
                                                />
                                                <div class="form-group">
                                                    <label class="required" for="title_{{$item->code}}">{{ __('messages.title') }} {{$item->code}}:</label>
                                                    @php
                                                        $title=null;
                                                        if(count($biotechnologicalFeature->translations)>0 && $biotechnologicalFeature->translations[$k]->locale==$item->code){
                                                            $title= $biotechnologicalFeature->translations[$k]->title;
                                                        }
                                                    @endphp
                                                    <input
                                                            type="text"
                                                            class="form-control "
                                                            name="title_{{$item->code}}"
                                                            id="title_{{$item->code}}"
                                                            placeholder="{{ __('messages.title') }}"
                                                            value="{{$title}}"
                                                    />
                                                    @error('title_{{$item->code}}')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if (count($errors) > 0)
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
                        <!-- /.card -->
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-4">
                    <div class="card card-primary card-outline p-3">
                        <div class="card-body">
                            @php
                                $status=0;
                            @endphp
                            @if ($biotechnologicalFeature->count()>0)
                                @php
                                    $status=$biotechnologicalFeature->status;
                                @endphp
                            @endif
                            <div class="form-group">
                                <label for="status">{{ __('messages.status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value='0' {{($status)?'':'selected'}}>False</option>
                                    <option value='1' {{($status)?'selected':''}}>True</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary  pull-right">{{ __('messages.save') }}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif




    </div>

</div>