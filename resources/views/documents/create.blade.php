@extends('adminlte::page')
@section('template_title')
    Create Document
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Document</span>
                    </div>
                    <div class="card-body">
                        {!! form::open(['route' => 'documents.store', 'files' => true]) !!}

                        @csrf

                        @include('documents.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
