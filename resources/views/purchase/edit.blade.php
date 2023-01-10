@extends('adminlte::page')

@section('template_title')
    Update Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Purchase</span>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('purchases.update1',  ['id'=> $purchase->id]) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
        $('#total').html(total);

        $(document).ready(function () {
           $.ajax({
            url: "{{ route('purchases.list.supplier', 'id') }}".replace('id', {{ $purchase->id }}),
            type: "get",
            success: function (response) {
                console.log(response);
                response.forEach(element => {
                    let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_productos[]" value="' +
                    element.product_id + '"><input type="hidden" name="list_quantity[]" value="' + element.quantity +
                    '"><input type="hidden" name="list_precios[]" value="' + element.price + '">' + i++ +
                    '</td><td>' + element.product.name + '</td><td>' + element.quantity + '</td><td>' + element.price + '</td><td>' +
                    element.price * element.quantity + '</td><td><button onclick="remove(' +
                    index + ' , ' + (element.price * element.quantity) + ')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td></tr>';
                    $('#detalle tbody').append(row);
                    index++;
                    total += element.price * element.quantity;
                    $('#total').val(total);
                });

            }
           });
        });



        $('#add').click(function(e) {
            e.preventDefault();
            let producto = $('#productos').val().split('_');
        let quantity = $('#cuantity').val();
            if (validate(quantity, producto[0], producto[3])) {
                let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_productos[]" value="' +
                    producto[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity +
                    '"><input type="hidden" name="list_precios[]" value="' + producto[2] + '">' + i++ +
                    '</td><td>' + producto[1] + '</td><td>' + quantity + '</td><td>' + producto[2] + '</td><td>' +
                    producto[2] * quantity + '</td><td><button onclick="remove(' +
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
