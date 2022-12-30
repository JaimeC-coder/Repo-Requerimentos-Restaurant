@extends('adminlte::page')
@section('template_title')
    {{ $elaboration->name ?? 'Show Elaboration' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Elaboration</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('elaborations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Cuantity:</strong>
                            {{ $elaboration->cuantity }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $elaboration->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $elaboration->employee_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
