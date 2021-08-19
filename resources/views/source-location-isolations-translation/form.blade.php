<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('locale') }}
            {{ Form::text('locale', $sourceLocationIsolationsTranslation->locale, ['class' => 'form-control' . ($errors->has('locale') ? ' is-invalid' : ''), 'placeholder' => 'Locale']) }}
            {!! $errors->first('locale', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('source_location_isolations_id') }}
            {{ Form::text('source_location_isolations_id', $sourceLocationIsolationsTranslation->source_location_isolations_id, ['class' => 'form-control' . ($errors->has('source_location_isolations_id') ? ' is-invalid' : ''), 'placeholder' => 'Source Location Isolations Id']) }}
            {!! $errors->first('source_location_isolations_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $sourceLocationIsolationsTranslation->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('slug') }}
            {{ Form::text('slug', $sourceLocationIsolationsTranslation->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug']) }}
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('body') }}
            {{ Form::text('body', $sourceLocationIsolationsTranslation->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $sourceLocationIsolationsTranslation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>