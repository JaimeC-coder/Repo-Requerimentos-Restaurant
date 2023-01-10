@extends('adminlte::page')

@section('template_title')
    {{ $purchase->name ?? 'Show Purchase' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Purchase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchases.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $purchase->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Supplier Id:</strong>
                            {{ $purchase->supplier_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $purchase->employee_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
