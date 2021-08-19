<div class="card-body">
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <ul class="nav nav-pills mr-auto p-2">
                    <li class="nav-item"><a class="nav-link {{($current_step==1)?'active':''}}" href="#user_info"
                                            data-toggle="tab"
                                            wire:click="ChangeCurrentStep(1)">{{ __('messages.user_info') }}</a></li>
                    <li class="nav-item"><a class="nav-link {{($current_step==2)?'active':''}}" href="#profile_info"
                                            data-toggle="tab"
                                            wire:click="ChangeCurrentStep(2)">{{ __('messages.profile_info') }}</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form>
                    <div class="tab-content">
                        <div class="tab-pane {{($current_step==1)?'active':''}}" id="user_info">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="required" for="name">{{ __('messages.name') }}:</label>
                                        <input
                                                type="text"
                                                class="form-control  {{ $errors->has($name) ? 'is-invalid' : '' }}"
                                                name="name"
                                                id="name"
                                                wire:model="name"
                                                placeholder="{{ __('messages.name') }}"
                                        />
                                        @error('name') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="required" for="email">{{ __('messages.email') }}:</label>
                                        <input
                                                type="email"
                                                class="form-control  {{ $errors->has($email) ? 'is-invalid' : '' }}"
                                                name="email"
                                                id="email"
                                                wire:model="email"
                                                placeholder="{{ __('messages.email') }}"
                                        />
                                        @error('email') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="required" for="password">{{ __('messages.password') }}:</label>
                                        <input
                                                type="password"
                                                class="form-control  {{ $errors->has($password) ? 'is-invalid' : '' }}"
                                                name="password"
                                                id="password"
                                                wire:model="password"
                                                placeholder="{{ __('messages.password') }}"
                                        />

                                        @error('password') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                        <label class="required"
                                               for="confirm_password">{{ __('messages.confirm_password') }}:</label>
                                        <input
                                                type="password"
                                                class="form-control  {{ $errors->has($confirm_password) ? 'is-invalid' : '' }}"
                                                name="confirm_password"
                                                id="confirm_password"
                                                wire:model="confirm_password"
                                                placeholder="{{ __('messages.confirm_password') }}"
                                        />
                                        @error('confirm_password') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="inline-block w-32 font-bold">{{ __('messages.role') }}:</label>
                                        <select name="role" wire:model="role_id"
                                                class="border shadow p-2 bg-white">
                                            <option value=''>{{ __('messages.choose_role') }}</option>
                                            @foreach($roles as $role)
                                                <option value={{ $role }}>{{ $role}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        @error('role_id') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg pull-right"
                                    wire:click.prevent="firstForm()">{{ __('messages.save') }}
                            </button>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane {{($current_step==2)?'active':''}}" id="profile_info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                        <label class="required" for="date_of_birth">{{ __('messages.date_of_birth') }}
                                            :</label>
                                        <input
                                                type="date"
                                                class="form-control "
                                                name="date_of_birth"
                                                id="date_of_birth"
                                                wire:model="date_of_birth"
                                                placeholder="{{ __('messages.date_of_birth') }}"
                                        />
                                        @error('date_of_birth') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div><div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask name="phone_number" id="phone_number" wire:model="phone_number"
                                                placeholder="{{ __('messages.phone_number') }}">

                                          </div>
                                        
                                        @error('phone_number') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="required" for="pnf_code">{{ __('messages.pnf_code') }}:</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                name="pnf_code"
                                                id="pnf_code"
                                                wire:model="pnf_code"
                                                placeholder="{{ __('messages.pnf_code') }}"
                                        />
                                        @error('pnf_code') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="required"
                                               for="passport_seria_number">{{ __('messages.passport_seria_number') }}
                                            :</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                name="passport_seria_number"
                                                id="passport_seria_number"
                                                wire:model="passport_seria_number"
                                                placeholder="{{ __('messages.passport_seria_number') }}"
                                        />

                                        @error('passport_seria_number') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                        <label class="required"
                                               for="kursi">{{ __('messages.kursi') }}:</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                name="kursi"
                                                id="kursi"
                                                wire:model="kursi"
                                                placeholder="{{ __('messages.kursi') }}"
                                        />
                                        @error('kursi') <span
                                                class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @if($faculties->count()>0)
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="inline-block w-32 font-bold">{{ __('messages.faculties') }}
                                                :</label>
                                            <select name="faculties" wire:model="faculty_id"
                                                    class="border shadow p-2 bg-white">
                                                <option value=''>{{ __('messages.choose') }}</option>
                                                @foreach($faculties as $v)
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
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
                                            <select name="faculties" wire:model="direction_id"
                                                    class="border shadow p-2 bg-white">
                                                <option value=''>{{ __('messages.choose') }}</option>
                                                @foreach($directions as $v)
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
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
                                            <select name="genders" wire:model="gender_id"
                                                    class="border shadow p-2 bg-white">
                                                <option value=''>{{ __('messages.choose') }}</option>
                                                @foreach($genders as $v)
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
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
                                            <select name="user_types" wire:model="user_type_id"
                                                    class="border shadow p-2 bg-white">
                                                <option value=''>{{ __('messages.choose') }}</option>
                                                @foreach($user_types as $v)
                                                    <option value={{ $v->id }}>{{ $v->name}}</option>
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
                            <button class="btn btn-primary btn-lg pull-right"
                                    type="submit"
                                    wire:click.prevent="store()">{{ __('messages.save') }}
                            </button>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </form><!-- /.form -->

            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>

</div>

