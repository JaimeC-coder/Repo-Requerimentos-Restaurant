@extends('adminlte::page')

@section('template_title')
    Client
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Client') }}
                            </span>

                             <div class="float-right">
                               @can('clients-create')

                               <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Dni</th>
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $client->DNI }}</td>
											<td>{{ $client->name }}</td>

                                            <td>
                                                @can('clients.show')

                                                <a class="btn btn-sm btn-primary " href="{{ route('clients.show',$client->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                @endcan
                                                @can('clients.edit')

                                                <a class="btn btn-sm btn-success" href="{{ route('clients.edit',$client->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @endcan
                                                @can('clients.destroy')

                                                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
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
                {!! $clients->links() !!}
            </div>
        </div>
    </div>
@endsection
