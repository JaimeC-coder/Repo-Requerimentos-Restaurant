<div class="box box-info padding-1">
    <div class="row">
    <div class="col-md-6">
            {{ Form::label('employee_id') }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
            {{ Form::hidden('employee_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {{ Form::text('', Auth::user()->name, ['readeronly','class' => ' form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee']) }}
        </div>

        <div class="col-md-6">
            {{ Form::label('supplier_id') }}
            {{ Form::select('supplier_id',$supplier,false, ['class' => 'form-control' . ($errors->has('supplier_id') ? ' is-invalid' : ''), 'placeholder' => 'Supplier Id']) }}
            {!! $errors->first('supplier_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                <label for="products">Seleccione un producto</label>
                <select id="productos" class="form-control">
                    <option value="">Seleccione un producto</option>
                    @foreach ($products as $product)
                        <option
                            value="{{ $product->id }}_{{ $product->name }}_{{ $product->stock }}">
                            {{ $product->name }}</option>
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
                    <h3 class="card-title">List Supply</h3>
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

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
