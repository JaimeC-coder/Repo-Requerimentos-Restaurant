<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', null, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('table_id') }}
            {!! Form::hidden('table_id',$table->id ) !!}
            {{ Form::text(null, $table->name , ['class' => 'form-control ' . ($errors->has('table_id') ? ' is-invalid' : ''), 'placeholder' => 'Table Id','disabled']) }}
            {!! $errors->first('table_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {!! Form::hidden('employee_id',$employee->id ) !!}
            {{ Form::text('', $employee->user()->first()->name, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id','disabled']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- <div class="form-group">
            {{ Form::label('client_id') }}
            {{ Form::text('client_id', null, ['class' => 'form-control' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => 'Client Id']) }}
            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
