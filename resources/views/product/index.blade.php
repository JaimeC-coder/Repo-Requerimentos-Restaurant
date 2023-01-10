@extends('adminlte::page')

@section('template_title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product') }}
                            </span>

                             <div class="float-right">
                            @can('products.create')
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
										<th>Stock</th>
										<th>Prepared</th>

										<th>Status</th>
										<th>Category</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $product->name }}</td>
											<td>{{ $product->description }}</td>
											<td>{{ $product->price }}</td>
											<td>{{ $product->stock }}</td>
											<td>{{ $product->prepared }}</td>
											<td>{{ $product->status }}</td>
											<td>{{ $product->category()->first()->name }}</td>

                                            <td>
                                                @can('products.show')
                                                <a class="btn btn-sm btn-primary " href="{{ route('products.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                @endcan
                                                @can('products.edit')
                                                <a class="btn btn-sm btn-success" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @endcan
                                                @can('products.destroy')
                                               <form action="{{ route('products.destroy',$product->id) }}" method="POST">
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
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
