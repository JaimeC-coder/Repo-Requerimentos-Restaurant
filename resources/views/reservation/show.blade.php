@extends('adminlte::page')

@section('template_title')
    {{ $reservation->name ?? 'Show Reservation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reservation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $reservation->date }}
                        </div>
                        <div class="form-group">
                            <strong>Time:</strong>
                            {{ $reservation->time }}
                        </div>
                        <div class="form-group">
                            <strong>Client Id:</strong>
                            {{ $reservation->client_id }}
                        </div>
                        <div class="form-group">
                            <strong>Table Id:</strong>
                            {{ $reservation->table_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
