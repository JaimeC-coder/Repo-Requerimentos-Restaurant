@extends('layouts.app')

@section('template_title')
    {{ $productTag->name ?? 'Show Product Tag' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product Tag</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-tags.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productTag->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tag Id:</strong>
                            {{ $productTag->tag_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
