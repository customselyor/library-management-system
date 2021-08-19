<div class="card-body">
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <ul class="nav nav-pills mr-auto p-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="#user_info" data-toggle="tab">
                            {{ __('messages.user_info') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#profile_info" data-toggle="tab" >
                            {{ __('messages.profile_info') }}
                        </a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="tab-content">
                    <div class="tab-pane active" id="user_info">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{ Form::label(__('messages.name')) }}
                                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('messages.name')]) }}
                                    @error('name') 
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{ Form::label(__('messages.email')) }}
                                    {!! Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('messages.email')]) !!}
                                    @error('email') <span
                                            class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="required" for="password">{{ __('messages.password') }}:</label>
                                    {!! Form::password('password', array('placeholder' => __('messages.password'),'class' => 'form-control')) !!}

                                    @error('password') <span
                                            class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="required" for="confirm_password">{{ __('messages.confirm_password') }}:</label>
                                    {!! Form::password('password_confirmation', array('placeholder' => __('messages.confirm_password'),'class' => 'form-control')) !!}
                                    @error('password_confirmation') <span
                                            class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="inline-block w-32 font-bold">{{ __('messages.role') }}:</label>
                                    <select name="role_id" class="border shadow p-2 bg-white">
                                        <option value=''>{{ __('messages.choose_role') }}</option>
                                        
                                        @foreach($roles as $role)
                                            @if (old('role_id')==$role )
                                                <option value={{ $role }} selected>{{ $role}}</option>                                                
                                            @else
                                                <option value={{ $role }}>{{ $role}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('role_id') <span
                                            class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane " id="profile_info">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="required" for="date_of_birth">{{ __('messages.date_of_birth') }}:</label>
                                    {{ Form::date('date_of_birth', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                                    @error('date_of_birth') 
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="photo">{{ __('messages.photo') }}:</label>
                                    <input type="file" name="file" class='form-control'/>
                                    {{-- @if ($user->profile->image)
                                        <img src="{{ asset('/storage/books/coverage/'.$book->image) }}" width="100px">
                                    @endif --}}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask name="phone_number" id="phone_number" 
                                            placeholder="{{ __('messages.phone_number') }}" value={{old('phone_number')}}>
                                    </div>                                    
                                    @error('phone_number') <span
                                            class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{ Form::label(__('messages.passport_seria_number')) }}
                                    {{ Form::text('passport_seria_number', $user->passport_seria_number, ['class' => 'form-control' . ($errors->has('passport_seria_number') ? ' is-invalid' : ''), 'placeholder' => __('messages.passport_seria_number')]) }}
                                    @error('passport_seria_number') 
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">

                                    {{ Form::label(__('messages.kursi')) }}
                                    {{ Form::text('kursi', $user->kursi, ['class' => 'form-control' . ($errors->has('kursi') ? ' is-invalid' : ''), 'placeholder' => __('messages.kursi')]) }}
                                    @error('kursi') 
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if($faculties->count()>0)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="inline-block w-32 font-bold">{{ __('messages.faculties') }}
                                            :</label>
                                        <select name="faculty_id" 
                                                class="border shadow p-2 bg-white">
                                            <option value=''>{{ __('messages.choose') }}</option>
                                            @foreach($faculties as $v)
                                                @if (old('faculty_id')==$v->id)
                                                    <option value={{ $v->id }} selected>{{ $v->name}}</option>                                                
                                                @else
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        @error('faculty_id') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($directions->count()>0)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="inline-block w-32 font-bold">{{ __('messages.directions') }}
                                            :</label>
                                        <select name="direction_id" 
                                                class="border shadow p-2 bg-white">
                                            <option value=''>{{ __('messages.choose') }}</option>
                                            @foreach($directions as $v)
                                                @if (old('direction_id')==$v->id)
                                                    <option value={{ $v->id }} selected>{{ $v->name}}</option>                                                
                                                @else
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        @error('direction_id') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($genders->count()>0)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="inline-block w-32 font-bold">{{ __('messages.genders') }}
                                            :</label>
                                        <select name="gender_id" 
                                                class="border shadow p-2 bg-white">
                                            <option value=''>{{ __('messages.choose') }}</option>
                                            @foreach($genders as $v)
                                                @if (old('gender_id')==$v->id)
                                                    <option value={{ $v->id }} selected>{{ $v->name}}</option>                                                
                                                @else
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        @error('gender_id') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if($user_types->count()>0)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="inline-block w-32 font-bold">{{ __('messages.user_types') }}
                                            :</label>
                                        <select name="user_type_id" wire:model="user_type_id"
                                                class="border shadow p-2 bg-white">
                                            <option value=''>{{ __('messages.choose') }}</option>
                                            @foreach($user_types as $v)
                                                @if (old('user_type_id')==$v->id)
                                                    <option value={{ $v->id }} selected>{{ $v->name}}</option>                                                
                                                @else
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        @error('user_type_id') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg pull-right">{{ __('messages.save') }}</button>

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->

            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>

</div>

 