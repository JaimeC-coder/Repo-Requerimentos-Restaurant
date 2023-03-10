@extends('adminlte::page')
@section('template_title')
Document
@endsection

@section('content')
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-12">
   <div class="card">
    <div class="card-header">
     <div style="display: flex; justify-content: space-between; align-items: center;">

      <span id="card_title">
       {{ __('Document') }}
      </span>

      <div class="float-right">
      @can('documents.create')
      <a href="{{ route('documents.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
         <th>Representative</th>

         <th>Action</th>
        </tr>
       </thead>
       <tbody>
        @if (!$documents->count())
        <tr>
         <td colspan="7">No records found!</td>
        </tr>
        @endif
        @foreach ($documents as $document)
        <tr>
         <td>{{ $document->id }}</td>
         <td>{{ $document->name }}</td>
         <td>
          @if ( $document->representative == 1)
          <span class="badge badge-success">Yes</span>
          @else
          <span class="badge badge-danger">No</span>
          @endif
         </td>
         <td>
            @can('documents.show')
          <a class="btn btn-sm btn-primary " href="{{ route('documents.show', $document) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
         @endcan
            @can('documents.edit')

          <a class="btn btn-sm btn-success" href="{{ route('documents.edit', $document) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>

          @endcan
            @can('documents.delete')
          <form action="{{ route('documents.destroy', $document) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
   {!! $documents->links() !!}
  </div>
 </div>
</div>
@endsection
