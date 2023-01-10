@extends('adminlte::page')

@section('template_title')
    Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order') }}
                            </span>

                             <div class="float-right">
                               @can('orders.create')
                               <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Amount</th>
										<th>Employee</th>
										<th>Client </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $order->amount }}</td>
											<td>{{ $order->table()->first()->name }}</td>
											<td>{{ $order->employee->user()->first()->name }}</td>
											<td>{{ $order->client_id }}</td>

                                            <td>

                                            @can('orders.show')
                                            <a class="btn btn-sm btn-primary " href="{{ route('orders.show',$order->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            @endcan
                                            @can('orders.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('orders.edit',$order->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('orders.delete')
                                            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
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
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection
