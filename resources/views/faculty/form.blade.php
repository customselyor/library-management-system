<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label(__('messages.title')) }}
            {{ Form::text('name', $faculty->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('messages.title')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label(__('messages.abbreviation')) }}
            {{ Form::text('abbreviation', $faculty->abbreviation, ['class' => 'form-control' . ($errors->has('abbreviation') ? ' is-invalid' : ''), 'placeholder' => __('messages.abbreviation')]) }}
            {!! $errors->first('abbreviation', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label(__('messages.code')) }}
            {{ Form::text('code', $faculty->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => __('messages.code')]) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</p>') !!} --}}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
    </div>
</div>