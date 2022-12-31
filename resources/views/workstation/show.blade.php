@extends('layouts.app')

@section('template_title')
    {{ $workstation->name ?? 'Show Workstation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Workstation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('workstations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $workstation->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
