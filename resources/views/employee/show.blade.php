@extends('adminlte::page')

@section('template_title')
    {{ $employee->name ?? 'Show Employee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $employee->DNI }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $employee->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $employee->address }}
                        </div>
                        <div class="form-group">
                            <strong>City:</strong>
                            {{ $employee->city }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employee->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
