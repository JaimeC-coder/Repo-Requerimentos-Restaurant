@extends('adminlte::page')

@section('template_title')
    Table
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Table') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('tables.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create Table') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3">
                            @foreach ($tables as $table)
                                {{-- boton para editar mesas --}}
                                <a href="{{ route('orders.create.table', $table->id) }}">

                                    <div class="col mb-auto text-center">
                                        <div
                                            class="card @if ($table->status == 'available') text-color-white bg-success @else text-color-white bg-danger @endif">
                                            <div class="" style="width: 100% ; height: 50px; font-size: 50px ">
                                                <i class="fas fa-utensils"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="  font-weight-bold text-uppercase">{{ $table->name }}</h5>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>

                    </div>
                </div>
                {!! $tables->links() !!}
            </div>
        </div>
    </div>
@endsection
