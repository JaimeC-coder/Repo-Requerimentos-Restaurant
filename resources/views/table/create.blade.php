@extends('adminlte::page')

@section('template_title')
Create Table
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Table</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tables.store') }}" role="form" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            {{ Form::label('Number of tables required') }}
                            {{ Form::number('count', null, ['class' => 'form-control' . ($errors->has('count') ? ' is-invalid' : ''), 'placeholder' => 'count']) }}
                            {!! $errors->first('count', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                      <div class="form-group">

                        {!! Form::submit(
                            'Create',
                            ['class' => 'btn btn-primary',]
                        ) !!}

                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
