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
                                        <a class="nav-link {{($k==0)?'active':''}}"
                                           id="language-tabs-tab-{{$item->code}}" data-toggle="pill"
                                           href="#language-tabs-tab-id-{{$item->code}}" role="tab"
                                           aria-controls="language-tabs-tab-id-{{$item->code}}"
                                           aria-selected="true">{{$item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="language-tabsContent">
                                @foreach ($app_languges as $k=>$item)
                                    <div class="tab-pane fade {{($k==0)?'active show':'hide'}}"
                                         id="language-tabs-tab-id-{{$item->code}}" role="tabpanel"
                                         aria-labelledby="language-tabs-tab-{{$item->code}}">
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
                                                    <label class="required"
                                                           for="title_{{$item->code}}">{{ __('messages.title') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $title=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $title= $morganism->translations[$k]->title;
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
                                                <div class="form-group">
                                                    <label class="required"
                                                           for="strain_label_{{$item->code}}">{{ __('messages.strain_label') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $title=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $title= $morganism->translations[$k]->title;
                                                        }
                                                    @endphp
                                                    <input
                                                            type="text"
                                                            class="form-control "
                                                            name="strain_label_{{$item->code}}"
                                                            id="strain_label_{{$item->code}}"
                                                            placeholder="{{ __('messages.strain_label') }}"
                                                            value="{{$title}}"
                                                    />
                                                    @error('strain_label_{{$item->code}}')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label class="required"
                                                           for="enzymatic_activity_extreme_conditions_protein_{{$item->code}}">{{ __('messages.enzymatic_activity_extreme_conditions_protein') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $enzymatic_activity_extreme_conditions_protein=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $enzymatic_activity_extreme_conditions_protein= $morganism->translations[$k]->enzymatic_activity_extreme_conditions_protein;
                                                        }
                                                    @endphp
                                                    <textarea name="enzymatic_activity_extreme_conditions_protein_{{$item->code}}" id="enzymatic_activity_extreme_conditions_protein_{{$item->code}}" cols="4" rows="5" class="form-control ">{{($enzymatic_activity_extreme_conditions_protein)??$enzymatic_activity_extreme_conditions_protein}}</textarea>

                                                    @error('enzymatic_activity_extreme_conditions_protein_{{$item->code}}
                                                    ')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="required"
                                                           for="characteristics_produced_compounds_{{$item->code}}">{{ __('messages.characteristics_produced_compounds') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $characteristics_produced_compounds=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $characteristics_produced_compounds= $morganism->translations[$k]->characteristics_produced_compounds;
                                                        }
                                                    @endphp
                                                    <textarea name="characteristics_produced_compounds_{{$item->code}}" id="characteristics_produced_compounds_{{$item->code}}" cols="4" rows="5" class="form-control ">{{($characteristics_produced_compounds)??$characteristics_produced_compounds}}</textarea>
                                                    @error('characteristics_produced_compounds_{{$item->code}}')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="required"
                                                           for="pathogenicity_{{$item->code}}">{{ __('messages.pathogenicity') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $pathogenicity=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $pathogenicity= $morganism->translations[$k]->pathogenicity;
                                                        }
                                                    @endphp
                                                    <textarea name="pathogenicity_{{$item->code}}" id="pathogenicity_{{$item->code}}" cols="4" rows="5" class="form-control ">{{($pathogenicity)??$pathogenicity}}</textarea>

                                                    @error('pathogenicity_{{$item->code}}
                                                    ')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="required"
                                                           for="comments_{{$item->code}}">{{ __('messages.comments') }} {{$item->code}}
                                                        :</label>
                                                    @php
                                                        $comments=null;
                                                        if(count($morganism->translations)>0 && $morganism->translations[$k]->locale==$item->code){
                                                            $comments= $morganism->translations[$k]->comments;
                                                        }
                                                    @endphp
                                                    <textarea name="comments_{{$item->code}}" id="comments_{{$item->code}}" cols="4" rows="5" class="form-control ">{{($comments)??$comments}}</textarea>
                                                    @error('comments_{{$item->code}}')
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
                            @if ($morganism->count()>0)
                                @php
                                    $status=$morganism->status;
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
                            <div class="form-group">
                                <label for="role_id">{{ __('messages.roles') }}
                                    : </label>

                                <select class="form-control" id="role_id"
                                        name="role_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($roles as $role)
                                        @if(isset($morganism) && $morganism->role_id==$role->id)
                                            <option value="{{ $role->id }}"
                                                    selected>{{ $role->name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="micro_parent_category_id">{{ __('messages.micro_parent_categories') }}
                                    : </label>

                                <select class="form-control" id="micro_parent_category_id"
                                        name="micro_parent_category_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($microParentCategory as $microParentCat)
                                        @if(isset($morganism) && $morganism->micro_parent_category_id==$microParentCat->id)
                                            <option value="{{ $microParentCat->id }}"
                                                    selected>{{ $microParentCat->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $microParentCat->id }}">{{ $microParentCat->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('micro_parent_category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{ Form::label('counter') }}
                                {{ Form::text('counter', $morganism->counter, ['class' => 'form-control' . ($errors->has('counter') ? ' is-invalid' : ''), 'placeholder' => 'Counter']) }}
                                {!! $errors->first('counter', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('strain_in_collection') }}
                                {{ Form::text('strain_in_collection', $morganism->strain_in_collection, ['class' => 'form-control' . ($errors->has('strain_in_collection') ? ' is-invalid' : ''), 'placeholder' => 'Strain In Collection']) }}
                                {!! $errors->first('strain_in_collection', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('date_of_isolation') }}
                                {{ Form::text('date_of_isolation', $morganism->date_of_isolation, ['class' => 'form-control' . ($errors->has('date_of_isolation') ? ' is-invalid' : ''), 'placeholder' => 'Date Of Isolation']) }}
                                {!! $errors->first('date_of_isolation', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('date_of_receipt') }}
                                {{ Form::text('date_of_receipt', $morganism->date_of_receipt, ['class' => 'form-control' . ($errors->has('date_of_receipt') ? ' is-invalid' : ''), 'placeholder' => 'Date Of Receipt']) }}
                                {!! $errors->first('date_of_receipt', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('halophility') }}
                                {{ Form::text('halophility', $morganism->halophility, ['class' => 'form-control' . ($errors->has('halophility') ? ' is-invalid' : ''), 'placeholder' => 'Halophility']) }}
                                {!! $errors->first('halophility', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('acidophility') }}
                                {{ Form::text('acidophility', $morganism->acidophility, ['class' => 'form-control' . ($errors->has('acidophility') ? ' is-invalid' : ''), 'placeholder' => 'Acidophility']) }}
                                {!! $errors->first('acidophility', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('alcaliphility') }}
                                {{ Form::text('alcaliphility', $morganism->alcaliphility, ['class' => 'form-control' . ($errors->has('alcaliphility') ? ' is-invalid' : ''), 'placeholder' => 'Alcaliphility']) }}
                                {!! $errors->first('alcaliphility', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('thermophility') }}
                                {{ Form::text('thermophility', $morganism->thermophility, ['class' => 'form-control' . ($errors->has('thermophility') ? ' is-invalid' : ''), 'placeholder' => 'Thermophility']) }}
                                {!! $errors->first('thermophility', '<div class="invalid-feedback">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                <label for="source_location_isolation_id">{{ __('messages.source_location_lsolation') }}
                                    : </label>

                                <select class="form-control" id="source_location_isolation_id"
                                        name="source_location_isolation_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($sourceLocationIsolation as $item)
                                        @if(isset($morganism) && $morganism->source_location_isolation_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('source_location_isolation_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="identified_by_id">{{ __('messages.identified_by') }}: </label>

                                <select class="form-control" id="identified_by_id" name="identified_by_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($author as $item)
                                        @if(isset($morganism) && $morganism->identified_by_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('identified_by_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deposited_by_id">{{ __('messages.deposited_by') }}: </label>

                                <select class="form-control" id="deposited_by_id" name="deposited_by_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($author as $item)
                                        @if(isset($morganism) && $morganism->deposited_by_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('deposited_by_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="conditions_preservation_id">{{ __('messages.condition_preservation') }}
                                    : </label>

                                <select class="form-control" id="conditions_preservation_id"
                                        name="conditions_preservation_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($conditionPreservation as $item)
                                        @if(isset($morganism) && $morganism->conditions_preservation_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('conditions_preservation_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="conditions_growth_id">{{ __('messages.conditions_growths') }}: </label>

                                <select class="form-control" id="conditions_growth_id" name="conditions_growth_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($conditionsGrowth as $item)
                                        @if(isset($morganism) && $morganism->conditions_growth_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('conditions_growth_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="growth_salt_presence_id">{{ __('messages.growth_salt_presence') }}: </label>

                                <select class="form-control" id="growth_salt_presence_id"
                                        name="growth_salt_presence_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($growth as $item)
                                        @if(isset($morganism) && $morganism->growth_salt_presence_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('growth_salt_presence_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="growth_ph_lt_7_id">{{ __('messages.growth_ph_lt_7') }}: </label>

                                <select class="form-control" id="growth_ph_lt_7_id" name="growth_ph_lt_7_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($growth as $item)
                                        @if(isset($morganism) && $morganism->growth_ph_lt_7_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('growth_ph_lt_7_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="growth_ph_mt_7_id">{{ __('messages.growth_ph_mt_7') }}: </label>

                                <select class="form-control" id="growth_ph_mt_7_id" name="growth_ph_mt_7_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($growth as $item)
                                        @if(isset($morganism) && $morganism->growth_ph_mt_7_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('growth_ph_mt_7_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="growth_higher_t_id">{{ __('messages.growth_higher_t') }}: </label>

                                <select class="form-control" id="growth_higher_t_id" name="growth_higher_t_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($growth as $item)
                                        @if(isset($morganism) && $morganism->growth_higher_t_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('growth_higher_t_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="biotechnological_features_id">{{ __('messages.biotechnological_features') }}
                                    : </label>

                                <select class="form-control" id="biotechnological_features_id"
                                        name="biotechnological_features_id">
                                    <option value="">-- {{ __('messages.select') }} --</option>
                                    @foreach($biotechnologicalFeature as $item)
                                        @if(isset($morganism) && $morganism->biotechnological_features_id==$item->id)
                                            <option value="{{ $item->id }}"
                                                    selected>{{ $item->translate('uz')->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->translate('uz')->title }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('biotechnological_features_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="box-footer mt20">
                                <button type="submit"
                                        class="btn btn-primary  pull-right">{{ __('messages.save') }}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif


    </div>
</div>