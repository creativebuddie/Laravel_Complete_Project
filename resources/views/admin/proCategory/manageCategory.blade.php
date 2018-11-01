@extends('admin.layout.adminLayout')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Manage Category</strong>
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>

        <th class="text-center">Category</th>
        <th class="text-center">Role</th>
        <th class="text-center">Status</th>
        <th class="text-center">Update</th>
        <th class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($category as $categories)	
      <tr id="category-row-{{$categories->id}}">
        <td class="text-center">{{ $categories->cat_name }}</td>
        @if($categories->cat_role==0)
        <td class="text-center">Parent</td>
        @else
        <td class="text-center">Child</td>
        @endif
        <td class="text-center" ><span class="badge badge-success"><a href="javascript:void(0)" id="{{ $categories->id }}" onclick="genericStatus(this.id, 'procategories');">{{ $categories->status }}</a></span></td>
		<td class="text-center"><a href='{{ url("proCategory/edit/{$categories->id}") }}'><i class="fa fa-edit"></i></a></td>
		<td class="text-center"><a href='{{ url("proCategory/destroy/{$categories->id}") }}'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    @endforeach 
    </tbody>
  </table>
        </div>
    </div>
</div>
@endsection
