@extends('adminlte::page')

@section('template_title')
Purchase
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Purchase') }}
                        </span>

                        <div class="float-right">
                            @can('purchases.create')
                            <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Supplier Id</th>
                                    <th>Employee Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $purchase->supplier->name }}</td>
                                    <td>{{ $purchase->employee->user->name }}</td>

                                    <td>
                                        @can('purchases.show')

                                        <a class="btn btn-sm btn-primary " href="{{ route('purchases.show',$purchase->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>

                                        @endcan
                                        @can('purchases.edit')

                                        <a class="btn btn-sm btn-success" href="{{ route('purchases.edit',$purchase->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                        @endcan

                                        @can('purchases.destroy')

                                        <form action="{{ route('purchases.destroy',$purchase->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $purchases->links() !!}
        </div>
    </div>
</div>
@endsection
