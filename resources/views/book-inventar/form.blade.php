<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('faculty_id') }}
            {{ Form::text('faculty_id', $bookInventar->faculty_id, ['class' => 'form-control' . ($errors->has('faculty_id') ? ' is-invalid' : ''), 'placeholder' => 'Faculty Id']) }}
            {!! $errors->first('faculty_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direction_id') }}
            {{ Form::text('direction_id', $bookInventar->direction_id, ['class' => 'form-control' . ($errors->has('direction_id') ? ' is-invalid' : ''), 'placeholder' => 'Direction Id']) }}
            {!! $errors->first('direction_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('arrived_year') }}
            {{ Form::text('arrived_year', $bookInventar->arrived_year, ['class' => 'form-control' . ($errors->has('arrived_year') ? ' is-invalid' : ''), 'placeholder' => 'Arrived Year']) }}
            {!! $errors->first('arrived_year', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('summarka_number') }}
            {{ Form::text('summarka_number', $bookInventar->summarka_number, ['class' => 'form-control' . ($errors->has('summarka_number') ? ' is-invalid' : ''), 'placeholder' => 'Summarka Number']) }}
            {!! $errors->first('summarka_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('faculty_code') }}
            {{ Form::text('faculty_code', $bookInventar->faculty_code, ['class' => 'form-control' . ($errors->has('faculty_code') ? ' is-invalid' : ''), 'placeholder' => 'Faculty Code']) }}
            {!! $errors->first('faculty_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('copies') }}
            {{ Form::text('copies', $bookInventar->copies, ['class' => 'form-control' . ($errors->has('copies') ? ' is-invalid' : ''), 'placeholder' => 'Copies']) }}
            {!! $errors->first('copies', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inventar_number_begin') }}
            {{ Form::text('inventar_number_begin', $bookInventar->inventar_number_begin, ['class' => 'form-control' . ($errors->has('inventar_number_begin') ? ' is-invalid' : ''), 'placeholder' => 'Inventar Number Begin']) }}
            {!! $errors->first('inventar_number_begin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inventar_number_end') }}
            {{ Form::text('inventar_number_end', $bookInventar->inventar_number_end, ['class' => 'form-control' . ($errors->has('inventar_number_end') ? ' is-invalid' : ''), 'placeholder' => 'Inventar Number End']) }}
            {!! $errors->first('inventar_number_end', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qr_code_lists') }}
            {{ Form::text('qr_code_lists', $bookInventar->qr_code_lists, ['class' => 'form-control' . ($errors->has('qr_code_lists') ? ' is-invalid' : ''), 'placeholder' => 'Qr Code Lists']) }}
            {!! $errors->first('qr_code_lists', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inventar_number_removed') }}
            {{ Form::text('inventar_number_removed', $bookInventar->inventar_number_removed, ['class' => 'form-control' . ($errors->has('inventar_number_removed') ? ' is-invalid' : ''), 'placeholder' => 'Inventar Number Removed']) }}
            {!! $errors->first('inventar_number_removed', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('book_id') }}
            {{ Form::text('book_id', $bookInventar->book_id, ['class' => 'form-control' . ($errors->has('book_id') ? ' is-invalid' : ''), 'placeholder' => 'Book Id']) }}
            {!! $errors->first('book_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $bookInventar->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $bookInventar->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>