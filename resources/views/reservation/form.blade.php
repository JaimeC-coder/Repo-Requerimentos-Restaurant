<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', null, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('time') }}
            {{ Form::time('time', null, ['class' => 'form-control' . ($errors->has('time') ? ' is-invalid' : ''), 'placeholder' => 'Time']) }}
            {!! $errors->first('time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('table_id') }}

            <select name="table_id" id="table_id"
                class="form-control @if ($errors->has('table_id')) is-invalid @endif ">
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->name }} capacity for {{ $table->capacity }}</option>
                @endforeach
            </select>
            {!! $errors->first('table_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clien') }}
            <input type="text" name="DNI" id="DniClient" class="form-control">
            <input type="text" name="name" id="MNombreClient" class="form-control" readonly>


            {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}

            <span id="mensaje"></span>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('js')
    <script>



        $(document).ready(function() {
            $('#DniClient').on('keyup', function() {
                var query = $(this).val();
                //console.log(query);
                if (query != '') {
                    $.ajax({
                        url: "{{ route('reservations.buscarXDNI', 'dni') }}".replace('dni', query),
                        type: "get",
                        success: function(data) {
                            console.log(data);
                            if (data == '') {

                                $('#MNombreClient').prop('readonly', false);
                                $('#mensaje').html('El cliente no existe');

                            } else {
                                $('#MNombreClient').prop('readonly', true);
                                $('#mensaje').html('El cliente existe');
                                $('#MNombreClient').val(data.name);

                            }

                        }
                    });
                }
            });


        });
    </script>
@endsection
