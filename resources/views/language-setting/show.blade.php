<x-admin-layout>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Language Setting</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('language-settings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>{{ __('messages.code') }}:</strong>
                            {{ $languageSetting->code }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.title') }}:</strong>
                            {{ $languageSetting->title }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.status') }}:</strong>
                            {!! ($languageSetting->status==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.set_as_default') }}:</strong>
                            {!! ($languageSetting->set_as_default==1)?'<i class="far fa-check-circle text-success"></i>':'<i class="far fa-times-circle text-danger"></i>'; !!}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('messages.icon') }}:</strong>
                            {{ $languageSetting->icon }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $languageSetting->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $languageSetting->updated_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>