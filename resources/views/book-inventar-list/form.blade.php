<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('invertar_number') }}
            {{ Form::text('invertar_number', $bookInventarList->invertar_number, ['class' => 'form-control' . ($errors->has('invertar_number') ? ' is-invalid' : ''), 'placeholder' => 'Invertar Number']) }}
            {!! $errors->first('invertar_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_deleted') }}
            {{ Form::text('is_deleted', $bookInventarList->is_deleted, ['class' => 'form-control' . ($errors->has('is_deleted') ? ' is-invalid' : ''), 'placeholder' => 'Is Deleted']) }}
            {!! $errors->first('is_deleted', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comment') }}
            {{ Form::text('comment', $bookInventarList->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qr_img') }}
            {{ Form::text('qr_img', $bookInventarList->qr_img, ['class' => 'form-control' . ($errors->has('qr_img') ? ' is-invalid' : ''), 'placeholder' => 'Qr Img']) }}
            {!! $errors->first('qr_img', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $bookInventarList->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('book_id') }}
            {{ Form::text('book_id', $bookInventarList->book_id, ['class' => 'form-control' . ($errors->has('book_id') ? ' is-invalid' : ''), 'placeholder' => 'Book Id']) }}
            {!! $errors->first('book_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('book_inventar_id') }}
            {{ Form::text('book_inventar_id', $bookInventarList->book_inventar_id, ['class' => 'form-control' . ($errors->has('book_inventar_id') ? ' is-invalid' : ''), 'placeholder' => 'Book Inventar Id']) }}
            {!! $errors->first('book_inventar_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $bookInventarList->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $bookInventarList->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('extra1') }}
            {{ Form::text('extra1', $bookInventarList->extra1, ['class' => 'form-control' . ($errors->has('extra1') ? ' is-invalid' : ''), 'placeholder' => 'Extra1']) }}
            {!! $errors->first('extra1', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('extra2') }}
            {{ Form::text('extra2', $bookInventarList->extra2, ['class' => 'form-control' . ($errors->has('extra2') ? ' is-invalid' : ''), 'placeholder' => 'Extra2']) }}
            {!! $errors->first('extra2', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('extra3') }}
            {{ Form::text('extra3', $bookInventarList->extra3, ['class' => 'form-control' . ($errors->has('extra3') ? ' is-invalid' : ''), 'placeholder' => 'Extra3']) }}
            {!! $errors->first('extra3', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>