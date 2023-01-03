@extends('adminlte::page')

@section('template_title')
    Create Order
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Elaboration</span>
                    </div>
                    <div class="card-body">
                        {!!Form::open(['route' => 'orders.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                                        {!! Form::label('table_id', 'table') !!}
                                        {!! Form::text( '',$table->name, ['class' => 'form-control', 'disable']) !!}
                                        {!! Form::hidden('table_id', $table->id) !!}
                                        <small class="text-danger">{{ $errors->first('cuantity') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                                        {!! Form::label('employee_id', 'Employee') !!}

                                        {!! Form::text('', $employee->user()->first()->name, ['class' => 'form-control','disable']) !!}
                                        {!! Form::hidden('employee_id', $employee->id) !!}
                                        <small class="text-danger">{{ $errors->first('cuantity') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                                        <label for="products">Seleccione un producto</label>
                                        <select  id="productos" class="form-control">
                                            <option value="">Seleccione un producto</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}_{{$product->name}}_{{$product->price}}_{{$product->stock}}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('products') }}</small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                                        {!! Form::label('cuantity', 'Cantidad') !!}
                                        {!! Form::number('cuantity', 0, ['class' => 'form-control', 'required' => 'required', 'id' => 'cuantity']) !!}
                                        <small class="text-danger">{{ $errors->first('cuantity') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                                        {!! Form::label('Agregar', '') !!}
                                        <input type="button" class="form-control" id="add" value="Agregar">


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">List Product</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="suppliesDetail_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="detalle"
                                                            class="table table-bordered table-striped dataTable dtr-inline"
                                                            aria-describedby="suppliesDetail_info">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        #
                                                                    </th>
                                                                    <th>
                                                                        Nombre de insumo
                                                                    </th>
                                                                    <th>
                                                                        Cantidad
                                                                    </th>
                                                                    <th>
                                                                        Precio
                                                                    </th>
                                                                    <th>
                                                                        Acciones
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                <label for="total">Total</label>
                                                <input type="text" class="form-control" id="total" name="amount" value="0" readonly>
                                                <small class="text-danger">{{ $errors->first('amount') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    {{-- button save --}}
                                    <div class="form-group mb-3 mr-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i>
                                            Guardar
                                        </button>
                                    </div>
                                    {{-- button cancel --}}
                                    <div class="form-group mb-3 ml-4">
                                        <a href="{{ route('elaborations.index') }}" class="btn btn-danger">
                                            <i class="fas fa-ban fa-fw"></i>
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {!!form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        var agregar = document.getElementById('agregar');



        let index = 0;
    let i = 1;
    let total = 0;
    let list_producto = [];
    $('#total').html(total);
    $('#add').click(function(e) {
        e.preventDefault();
        let producto = $('#productos').val().split('_');
        let quantity = $('#cuantity').val();
        if (validate(quantity, producto[0], producto[3])) {
            let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_productos[]" value="' +
                producto[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity + '"><input type="hidden" name="list_precios[]" value="' + producto[2] + '">' + i++ +
                '</td><td>' + producto[1] + '</td><td>' + quantity + '</td><td>'+producto[2]+'</td><td>'+producto[2]*quantity+'</td><td><button onclick="remove(' +
                index + ' , ' + (producto[2] *
                    quantity) + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
            $('#error').removeClass('d-block');
            $('#detalle').append(row);
            total += (producto[2] * quantity);
            list_producto[index] = [producto[0]];
            $('#total').val(total);
            index++;
            $('#quantity').val(1);
            $('#error-exists').removeClass('d-block');
        }
    });
    function remove(row, price) {
        $('#row' + row).remove();
        total -= price;
        list_producto.splice(row);
        $('#total').html(total);
        index--;
        i--;
    }
    function validate(units, id, stock) {
        console.log(units + ' ' + stock);
        if (parseInt(units) <= parseInt(stock)) {
            if (parseInt(units) != 0) {
                for (let count = 0; count < list_producto.length; count++) {
                    const element = list_producto[count];
                    if (element == id) {
                        $('#error-exists').addClass('d-block');
                        return false;
                    }
                }
                return true;
            } else {
                $('#error').addClass('d-block');
                return false;
            }
        } else {
            $('#error-stock').addClass('d-block');
            return false;
        }
    }
    </script>
@endsection
