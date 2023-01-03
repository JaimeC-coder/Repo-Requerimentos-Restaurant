@extends('adminlte::page')

@section('template_title')
    Create Reservation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Reservation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('reservation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
