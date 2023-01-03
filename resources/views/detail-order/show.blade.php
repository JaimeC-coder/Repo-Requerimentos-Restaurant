@extends('layouts.app')

@section('template_title')
    {{ $detailOrder->name ?? 'Show Detail Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detail Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detail-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Order Id:</strong>
                            {{ $detailOrder->order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $detailOrder->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $detailOrder->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $detailOrder->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
