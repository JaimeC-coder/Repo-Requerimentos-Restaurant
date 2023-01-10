@extends('adminlte::page')

@section('template_title')
    Create Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Purchase</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('purchases.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('purchase.form')

                        </form>
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
        let producto = $('#productos').val().split('_');
        let quantity = $('#cuantity').val();





        $('#add').click(function(e) {
            e.preventDefault();
            let producto = $('#productos').val().split('_');
        let quantity = $('#cuantity').val();
            if (validate(quantity, producto[0])) {
                let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_productos[]" value="' +
                    producto[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity +
                    '">' + i++ +
                    '</td><td>' + producto[1] + '</td><td>' + quantity + '</td><td><button onclick="remove(' +
                    index + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
                $('#error').removeClass('d-block');
                $('#detalle').append(row);

                list_producto[index] = [producto[0]];

                index++;
                $('#quantity').val(1);
                $('#error-exists').removeClass('d-block');
            }
        });

        function remove(row) {
            $('#row' + row).remove();
          //  total -= price;
            list_producto.splice(row);
           // $('#total').html(total);
            index--;
            i--;
        }

        function validate(units, id) {
            //console.log(units + ' ' + stock);
            // if (parseInt(units) <= parseInt(stock)) {
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
            // } else {
            //     $('#error-stock').addClass('d-block');
            //     return false;
            // }
        }
    </script>
@endsection

