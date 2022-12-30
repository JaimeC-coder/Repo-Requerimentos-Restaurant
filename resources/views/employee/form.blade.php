<div class="box box-info padding-1">
 <div class="box-body">

  <div class="form-group">
   {{ Form::label('DNI') }}
   {{ Form::text('DNI', null, ['class' => 'form-control' . ($errors->has('DNI') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
   {!! $errors->first('DNI', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
   </div>
  <div class="form-group">
    {{ Form::label('email') }}
    {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
   </div>
  <div class="form-group">
    {{ Form::label('password') }}
    {{ Form::text('password', null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
   </div>
  <div class="form-group">
   {{ Form::label('phone') }}
   {{ Form::text('phone',null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
   {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <div class="form-group">
   {{ Form::label('address') }}
   {{ Form::text('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
   {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
  </div>
  <div class="form-group">
   {{ Form::label('city') }}
   {{ Form::text('city', null, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'City']) }}
   {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
  </div>


 </div>
 <div class="box-footer mt20">
  <button type="submit" class="btn btn-primary">Submit</button>
 </div>
</div>
