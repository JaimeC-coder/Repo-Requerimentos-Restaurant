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
                               ' @can('tables.create')
                               <a href="{{ route('tables.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create Table') }}
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row  row-cols-md-3">
                            @foreach ($tables as $table)
                                {{-- boton para editar mesas --}}


                                <div class="col mb-auto text-center">
                                    <div
                                        class="card
                                        @if($table->capacity == 0) text-color-white bg-danger
                                        @elseif($table->status == 'available') text-color-white bg-success
                                        @elseif($table->status == 'reserved') text-color-white bg-warning
                                        @else text-color-white bg-danger
                                        @endif">

                                        <a href="
                                        @if ($table->capacity != 0)
                                        {{ route('orders.create.table', $table->id) }}
                                        @endif">
                                        <div class="" style="width: 100% ; height: 50px; font-size: 50px ">
                                                <i class="fas fa-utensils"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="font-weight-bold text-uppercase  ">{{ $table->name }}</h5>
                                                <p>Number of chairs : {{ $table->capacity }}</p>
                                                @if ($table->capacity == 0)
                                                <span>update the number of chairs</span>
                                                @else
                                                <span> </span>

                                                @endif

                                            </div>
                                        </a>
                                        <div class="card-footer text-muted">
                                            <a href="{{ route('tables.edit', $table->id) }}"
                                                class="btn btn-primary btn-sm float-center" >

                                                <i class="fas fa-edit"></i>

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                {!! $tables->links() !!}
            </div>
        </div>
    </div>
@endsection
