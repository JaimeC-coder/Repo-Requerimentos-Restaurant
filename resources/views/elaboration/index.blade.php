@extends('adminlte::page')

@section('template_title')
    Elaboration
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Elaboration') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('elaborations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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

										<th>Cuantity</th>
										<th>Product Id</th>
										<th>Employee Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($elaborations as $elaboration)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $elaboration->cuantity }}</td>
											<td>{{ $elaboration->product->name }}</td>
											<td>{{ $elaboration->employee->user->name }}</td>

                                            <td>
                                                <form action="{{ route('elaborations.destroy',$elaboration->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('elaborations.show',$elaboration->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('elaborations.edit',$elaboration->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $elaborations->links() !!}
            </div>
        </div>
    </div>
@endsection
