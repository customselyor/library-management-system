<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('locale') }}
            {{ Form::text('locale', $morganismsTranslation->locale, ['class' => 'form-control' . ($errors->has('locale') ? ' is-invalid' : ''), 'placeholder' => 'Locale']) }}
            {!! $errors->first('locale', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('morganisms_id') }}
            {{ Form::text('morganisms_id', $morganismsTranslation->morganisms_id, ['class' => 'form-control' . ($errors->has('morganisms_id') ? ' is-invalid' : ''), 'placeholder' => 'Morganisms Id']) }}
            {!! $errors->first('morganisms_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $morganismsTranslation->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('slug') }}
            {{ Form::text('slug', $morganismsTranslation->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug']) }}
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('strain_label') }}
            {{ Form::text('strain_label', $morganismsTranslation->strain_label, ['class' => 'form-control' . ($errors->has('strain_label') ? ' is-invalid' : ''), 'placeholder' => 'Strain Label']) }}
            {!! $errors->first('strain_label', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('enzymatic_activity_extreme_conditions_protein') }}
            {{ Form::text('enzymatic_activity_extreme_conditions_protein', $morganismsTranslation->enzymatic_activity_extreme_conditions_protein, ['class' => 'form-control' . ($errors->has('enzymatic_activity_extreme_conditions_protein') ? ' is-invalid' : ''), 'placeholder' => 'Enzymatic Activity Extreme Conditions Protein']) }}
            {!! $errors->first('enzymatic_activity_extreme_conditions_protein', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('characteristics_produced_compounds') }}
            {{ Form::text('characteristics_produced_compounds', $morganismsTranslation->characteristics_produced_compounds, ['class' => 'form-control' . ($errors->has('characteristics_produced_compounds') ? ' is-invalid' : ''), 'placeholder' => 'Characteristics Produced Compounds']) }}
            {!! $errors->first('characteristics_produced_compounds', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pathogenicity') }}
            {{ Form::text('pathogenicity', $morganismsTranslation->pathogenicity, ['class' => 'form-control' . ($errors->has('pathogenicity') ? ' is-invalid' : ''), 'placeholder' => 'Pathogenicity']) }}
            {!! $errors->first('pathogenicity', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comments') }}
            {{ Form::text('comments', $morganismsTranslation->comments, ['class' => 'form-control' . ($errors->has('comments') ? ' is-invalid' : ''), 'placeholder' => 'Comments']) }}
            {!! $errors->first('comments', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('body') }}
            {{ Form::text('body', $morganismsTranslation->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $morganismsTranslation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>