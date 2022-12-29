@extends('layouts.app')

@section('template_title')
    {{ $table->name ?? 'Show Table' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Table</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tables.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $table->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $table->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
