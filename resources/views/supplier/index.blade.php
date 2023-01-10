@extends('adminlte::page')

@section('template_title')
Supplier
@endsection

@section('content')
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-12">
   <div class="card">
    <div class="card-header">
     <div style="display: flex; justify-content: space-between; align-items: center;">

      <span id="card_title">
       {{ __('Supplier') }}
      </span>

      <div class="float-right">
     @can('suppliers.create')
     <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
         <th>#</th>

         <th>Name</th>
         <th>type Document</th>
         <th>Document</th>
         <th>Phone</th>
         <th>Email</th>

         <th></th>
        </tr>
       </thead>
       <tbody>
        @foreach ($suppliers as $supplier)
        <tr>
         <td>{{ ++$i }}</td>

         <td>{{ $supplier->name }}</td>
         <td>{{ $supplier->document()->first()->name }}</td>
         <td>{{ $supplier->document }}</td>
         <td>{{ $supplier->phone }}</td>
         <td>{{ $supplier->email }}</td>
         <td>
            @can('suppliers.show')
            <a class="btn btn-sm btn-primary " href="{{ route('suppliers.show', $supplier->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
            @endcan
            @can('suppliers.edit')
             <a class="btn btn-sm btn-success" href="{{ route('suppliers.edit', $supplier->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
            @endcan
            @can('suppliers.destroy')
             <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
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
   {!! $suppliers->links() !!}
  </div>
 </div>
</div>
@endsection
