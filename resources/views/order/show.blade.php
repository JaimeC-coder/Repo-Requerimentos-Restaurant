@extends('adminlte::page')

@section('template_title')
    {{ $order->name ?? 'Show Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $order->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Table Id:</strong>
                            {{ $order->table_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $order->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $order->client_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
