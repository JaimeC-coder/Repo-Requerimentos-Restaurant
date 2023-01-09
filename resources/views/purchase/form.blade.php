<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $purchase->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('supply_id') }}
            {{ Form::text('supply_id', $purchase->supply_id, ['class' => 'form-control' . ($errors->has('supply_id') ? ' is-invalid' : ''), 'placeholder' => 'Supply Id']) }}
            {!! $errors->first('supply_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $purchase->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>