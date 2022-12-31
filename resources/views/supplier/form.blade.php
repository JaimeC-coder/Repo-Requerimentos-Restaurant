<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('document type') }}
            <br>
            @foreach ($documents as $document)
                <label class="mr-2">
                    {!! Form::radio('document_id', $document->id, null, [
                        'class' => 'form-control',
                        'id' => 'document__' . $document->representative,
                    ]) !!}
                    {{ $document->name }}
                </label>
            @endforeach
        </div>

        <div class="form-group">

            {{ Form::label('document') }}
            {{ Form::text('document', null, ['class' => 'form-control' . ($errors->has('document') ? ' is-invalid' : ''), 'placeholder' => 'Document']) }}
            {!! $errors->first('document', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" id="representative" hidden>
            {{ Form::label('representative') }}
            {{ Form::text('representative', null, ['class' => 'form-control' . ($errors->has('representative') ? ' is-invalid' : ''), 'placeholder' => 'Representative']) }}
            {!! $errors->first('representative', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('js')
    <script>

        $(document).ready(function() {
            $('input[type=radio]').change(function() {
                if ($(this).attr('id') == 'document__1'){

                    $('#representative').removeAttr('hidden');
                }else{
                    $('#representative').attr('hidden', 'hidden');
                }
            });
        });
    </script>
@endsection
