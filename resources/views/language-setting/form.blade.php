<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label(__('messages.code')) }}
            {{ Form::text('code', $languageSetting->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => __('messages.code')]) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label(__('messages.title')) }}
            {{ Form::text('title', $languageSetting->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('messages.title')]) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{$languageSetting->status}}
            {{ Form::label(__('messages.status')) }}
            {{-- {{ Form::text('status', $languageSetting->status, ) }} --}}
            {{ Form::checkbox('status',$languageSetting->status,null, ['class' => '' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => __('messages.status'), 'id'=>__('messages.status') ]) }}

            {!! $errors->first('status', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label(__('messages.set_as_default')) }}
            {{-- {{ Form::text('set_as_default', $languageSetting->set_as_default, ['class' => 'form-control' . ($errors->has('set_as_default') ? ' is-invalid' : ''), 'placeholder' => 'Set As Default']) }} --}}
            {{ Form::checkbox('set_as_default',null,null, ['class' => '' . ($errors->has('set_as_default') ? ' is-invalid' : ''), 'placeholder' => __('messages.set_as_default'), 'id'=>__('messages.set_as_default') ]) }}

            {!! $errors->first('set_as_default', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('icon') }}
            {{ Form::text('icon', $languageSetting->icon, ['class' => 'form-control' . ($errors->has('icon') ? ' is-invalid' : ''), 'placeholder' => 'Icon']) }}
            {!! $errors->first('icon', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>