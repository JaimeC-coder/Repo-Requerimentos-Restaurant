<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('cuantity') }}
            {{ Form::text('cuantity', $elaboration->cuantity, ['class' => 'form-control' . ($errors->has('cuantity') ? ' is-invalid' : ''), 'placeholder' => 'Cuantity']) }}
            {!! $errors->first('cuantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_id') }}
            {{ Form::text('product_id', $elaboration->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $elaboration->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
