<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label(__('messages.title')) }}
            {{ Form::text('name', $userType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('messages.title')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            @php
                $status=0;
            @endphp
            @if ($userType->count()>0)
                @php
                    $status=$userType->status;
                @endphp
            @endif
            <div class="form-group">
                <label for="status">{{ __('messages.status') }}</label>
                <select class="form-control" id="status" name="status">
                    <option value='0' {{($status)?'':'selected'}}>False</option>
                    <option value='1' {{($status)?'selected':''}}>True</option>
                </select>
                @error('status') 
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
    </div>
</div>