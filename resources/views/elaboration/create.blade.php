@extends('adminlte::page')
@section('template_title')
Create Elaboration
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
          <form method="POST" action="{{ route('elaborations.store') }}" role="form" id="form">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                  <label for="products">Seleccione un producto</label>
                  <select name="products" id="products" class="form-control">
                    <option value="">Seleccione un producto</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                  </select>
                  <small class="text-danger">{{ $errors->first('products') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('cuantity') ? ' has-error' : '' }}">
                  {!! Form::label('cuantity', 'Cantidad') !!}
                  {!! Form::number('cuantity', 0, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('cuantity') }}</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabla de insumos</h3>
                  </div>
                  <div class="card-body">
                    <div id="supplies_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="supplies" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="supplies_info">
                            <thead>
                              <tr>
                                <th>
                                  #
                                </th>
                                <th>
                                  Nombre de insumo
                                </th>
                                <th>
                                  Stock
                                </th>
                                <th>
                                  Acciones
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($supplies as $supply)
                              <tr>
                                <td>
                                  {{ $supply->id }}
                                </td>
                                <td>
                                  {{ $supply->name }}
                                </td>
                                <td>
                                  {{ $supply->stock }}
                                </td>
                                <td class="text-center">
                                  <button id="add-supplies" type="button" onclick="addSupplies( {{$supply->id}} )" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabla de insumos seleccionados</h3>
                  </div>
                  <div class="card-body">
                    <div id="suppliesDetail_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="row">
                        <div class="col-sm-12">
                          <table id="suppliesDetail" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="suppliesDetail_info">
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
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal" id="insumoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insumo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Mostrar datos del insumo --}}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label for="insumo_name">Nombre</label>
              <input type="text" class="form-control" id="insumo_name" name="insumo_name" disabled>
            </div>
            <div class="form-group mb-3">
              <label for="insumo_stock">Stock</label>
              <input type="text" class="form-control" id="insumo_stock" name="insumo_stock" disabled>
            </div>
            <input type="text" class="form-control" id="insumo_id" name="insumo_id" hidden>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="insumo_stock">Cantidad</label>
              <input type="text" class="form-control" id="insumo_cantidad" name="insumo_cantidad">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="insumoModalSave">Agregar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function() {
    $('#supplies').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    $('#suppliesDetail').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });

  function addSupplies(id) {
    $.ajax({
      url: "{{ route('supplies.getSupply.elaboration', 'id') }}".replace('id', id),
      type: 'GET',
      success: function(data) {
        console.log(data);
        $('#insumo_id').val(data.id);
        $('#insumo_name').val(data.name);
        $('#insumo_stock').val(data.stock);
        $('#insumoModal').modal('show');
      },
      error: function(data) {
        console.log(data);
      }
    });
  }

  $('#insumoModalSave').click(function() {

    $insumo_id = parseInt($('#insumo_id').val());
    $insumo_cantidad = parseInt($('#insumo_cantidad').val());
    $insumo_stock = parseInt($('#insumo_stock').val());
    $insumo_name = $('#insumo_name').val();
    var count = $('#suppliesDetail').DataTable().rows().count();
    var elements = $('#suppliesDetail').DataTable().rows().data();

    if ($insumo_cantidad <= 0) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'La cantidad debe ser mayor a 0',
      })
      return;
    }

    for (let index = 0; index < count; index++) {
      if ($insumo_stock < $insumo_cantidad) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'No hay suficiente stock',
        })
        return;
      }
    }
    var tableinsumo = $('#supplies').DataTable();

    var elementsinsumos = tableinsumo.rows().data();
    for (let index = 0; index < tableinsumo.rows().count(); index++) {
      if (elementsinsumos[index][0] == $insumo_id) {
        if (elementsinsumos[index][2] < $insumo_cantidad) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No hay suficiente stock',
          })
          $('#insumoModal').modal('hide');
          return;
        }
      }
    }

    var table = $('#suppliesDetail').DataTable();
    table.row.add([
      `${$insumo_id} <input type="text" name="insumo_id[]" value="${$insumo_id}" hidden>`,
      $insumo_name,
      `${$insumo_cantidad} <input type="text" name="insumo_cantidad[]" value="${$insumo_cantidad}" hidden>`,
      `
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteSupplies(${$insumo_id})"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-warning btn-sm" onclick="editSupplies(${$insumo_id})"><i class="fas fa-edit"></i></button>
                `
    ]).draw(false);


    for (let index = 0; index < tableinsumo.rows().count(); index++) {
      if (elementsinsumos[index][0] == $insumo_id) {
        var stock = elementsinsumos[index][2] - $insumo_cantidad;
        tableinsumo.cell(index, 2).data(stock).draw(false);
      }
    }

    $('#insumo_cantidad').val('');
    $('#insumoModal').modal('hide');
  });

  $('.btn-close').click(function() {
    $('#insumoModal').modal('hide');
  });

  function deleteSupplies(id) {
    var table = $('#suppliesDetail').DataTable();
    var elements = table.rows().data();
    var tableinsumo = $('#supplies').DataTable();
    var elementsinsumos = tableinsumo.rows().data();
    for (let i = 0; i < table.rows().count(); i++) {
      if (elements[i][0] == id) {
        for (let y = 0; y < tableinsumo.rows().count(); y++) {
          if (elementsinsumos[y][0] == elements[i][0]) {
            var stock = elementsinsumos[y][2] + parseInt(elements[i][2]);
            tableinsumo.cell(y, 2).data(stock).draw(false);
          }
        }
        table.row(i).remove().draw(false);
        // remover del array
        suppliesCantidad.splice(i, 1);
        suppliesId.splice(i, 1);
      }
    }

  }

  function editSupplies(id) {
    var table = $('#suppliesDetail').DataTable();
    var elements = table.rows().data();
    var tableinsumo = $('#supplies').DataTable();
    var elementsinsumos = tableinsumo.rows().data();
    for (let i = 0; i < table.rows().count(); i++) {
      if (elements[i][0] == id) {
        for (let y = 0; y < tableinsumo.rows().count(); y++) {
          if (elementsinsumos[y][0] == elements[i][0]) {
            var stock = elementsinsumos[y][2] + parseInt(elements[i][2]);
            tableinsumo.cell(y, 2).data(stock).draw(false);
          }
        }
        table.row(i).remove().draw(false);
        // remover del array
        suppliesCantidad.splice(i, 1);
        suppliesId.splice(i, 1);
      }
    }
    addSupplies(id);
  }
</script>
@endsection
