<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class=" form-check">
            {{ Form::checkbox('representative', 1, null,['class' => 'form-check-input' . ($errors->has('representative') ? ' is-invalid' : ''), 'placeholder' => 'representative','id'=> 'representative']) }}
            {!! $errors->first('representative', '<div class="invalid-feedback">:message</div>') !!}
            {{ Form::label('representative','Does this type of document need to be represented?') }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

