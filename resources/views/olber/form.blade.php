<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('kitobxon_id') }}
            {{ Form::text('kitobxon_id', $olber->kitobxon_id, ['class' => 'form-control' . ($errors->has('kitobxon_id') ? ' is-invalid' : ''), 'placeholder' => 'Kitobxon Id']) }}
            {!! $errors->first('kitobxon_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('book_id') }}
            {{ Form::text('book_id', $olber->book_id, ['class' => 'form-control' . ($errors->has('book_id') ? ' is-invalid' : ''), 'placeholder' => 'Book Id']) }}
            {!! $errors->first('book_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $olber->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('olgan_vaqti') }}
            {{ Form::text('olgan_vaqti', $olber->olgan_vaqti, ['class' => 'form-control' . ($errors->has('olgan_vaqti') ? ' is-invalid' : ''), 'placeholder' => 'Olgan Vaqti']) }}
            {!! $errors->first('olgan_vaqti', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('olgan_yil') }}
            {{ Form::text('olgan_yil', $olber->olgan_yil, ['class' => 'form-control' . ($errors->has('olgan_yil') ? ' is-invalid' : ''), 'placeholder' => 'Olgan Yil']) }}
            {!! $errors->first('olgan_yil', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('olgan_oy') }}
            {{ Form::text('olgan_oy', $olber->olgan_oy, ['class' => 'form-control' . ($errors->has('olgan_oy') ? ' is-invalid' : ''), 'placeholder' => 'Olgan Oy']) }}
            {!! $errors->first('olgan_oy', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('olgan_kun') }}
            {{ Form::text('olgan_kun', $olber->olgan_kun, ['class' => 'form-control' . ($errors->has('olgan_kun') ? ' is-invalid' : ''), 'placeholder' => 'Olgan Kun']) }}
            {!! $errors->first('olgan_kun', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nechchi_kun') }}
            {{ Form::text('nechchi_kun', $olber->nechchi_kun, ['class' => 'form-control' . ($errors->has('nechchi_kun') ? ' is-invalid' : ''), 'placeholder' => 'Nechchi Kun']) }}
            {!! $errors->first('nechchi_kun', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytarish_vaqti') }}
            {{ Form::text('qaytarish_vaqti', $olber->qaytarish_vaqti, ['class' => 'form-control' . ($errors->has('qaytarish_vaqti') ? ' is-invalid' : ''), 'placeholder' => 'Qaytarish Vaqti']) }}
            {!! $errors->first('qaytarish_vaqti', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytarish_yil') }}
            {{ Form::text('qaytarish_yil', $olber->qaytarish_yil, ['class' => 'form-control' . ($errors->has('qaytarish_yil') ? ' is-invalid' : ''), 'placeholder' => 'Qaytarish Yil']) }}
            {!! $errors->first('qaytarish_yil', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytarish_oy') }}
            {{ Form::text('qaytarish_oy', $olber->qaytarish_oy, ['class' => 'form-control' . ($errors->has('qaytarish_oy') ? ' is-invalid' : ''), 'placeholder' => 'Qaytarish Oy']) }}
            {!! $errors->first('qaytarish_oy', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytarish_kun') }}
            {{ Form::text('qaytarish_kun', $olber->qaytarish_kun, ['class' => 'form-control' . ($errors->has('qaytarish_kun') ? ' is-invalid' : ''), 'placeholder' => 'Qaytarish Kun']) }}
            {!! $errors->first('qaytarish_kun', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytargan_vaqti') }}
            {{ Form::text('qaytargan_vaqti', $olber->qaytargan_vaqti, ['class' => 'form-control' . ($errors->has('qaytargan_vaqti') ? ' is-invalid' : ''), 'placeholder' => 'Qaytargan Vaqti']) }}
            {!! $errors->first('qaytargan_vaqti', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytargan_yil') }}
            {{ Form::text('qaytargan_yil', $olber->qaytargan_yil, ['class' => 'form-control' . ($errors->has('qaytargan_yil') ? ' is-invalid' : ''), 'placeholder' => 'Qaytargan Yil']) }}
            {!! $errors->first('qaytargan_yil', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytargan_oy') }}
            {{ Form::text('qaytargan_oy', $olber->qaytargan_oy, ['class' => 'form-control' . ($errors->has('qaytargan_oy') ? ' is-invalid' : ''), 'placeholder' => 'Qaytargan Oy']) }}
            {!! $errors->first('qaytargan_oy', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qaytargan_kun') }}
            {{ Form::text('qaytargan_kun', $olber->qaytargan_kun, ['class' => 'form-control' . ($errors->has('qaytargan_kun') ? ' is-invalid' : ''), 'placeholder' => 'Qaytargan Kun']) }}
            {!! $errors->first('qaytargan_kun', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fakultet_id') }}
            {{ Form::text('fakultet_id', $olber->fakultet_id, ['class' => 'form-control' . ($errors->has('fakultet_id') ? ' is-invalid' : ''), 'placeholder' => 'Fakultet Id']) }}
            {!! $errors->first('fakultet_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $olber->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $olber->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>