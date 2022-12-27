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
       <a href="{{ route('documents.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
         <th>#</th>

         <th>Name</th>

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
          <a class="btn btn-sm btn-primary " href="{{ route('documents.show', $document) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
          <a class="btn btn-sm btn-success" href="{{ route('documents.edit', $document) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>

          <form action="{{ route('documents.destroy', $document) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>
            </form>

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
