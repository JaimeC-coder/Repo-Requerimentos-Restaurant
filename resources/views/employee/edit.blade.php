@extends('adminlte::page')
@section('template_title')
    Update Employee
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Employee</span>
                    </div>
                    <div class="card-body">
                        {{ Form::model($employees, ['route' => ['employees.update', $employees], 'method' => 'PATCH']) }}
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('employee.form')


                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $.ajax({
                url: "{{ route('employees.getUser','id') }}".replace('id', {{$employees->user_id}}),
                type: "get",
                success: function(response) {

                    console.log(response);
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#password').val(response.password);


                }
            });
        });
    </script>
@endsection
