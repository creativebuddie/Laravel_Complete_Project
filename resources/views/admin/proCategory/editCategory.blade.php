@extends('admin.layout.adminLayout')

@section('content')
<div class="col-lg-12">
	<form  method="POST" action="{{ url('proCategory/update', array($category->id)) }}" class="form-horizontal">
	  <div class="form-group">
	    <input type="text" name="name" class="form-control" placeholder="Add Name" value="{{ $category->cat_name }}">
	  </div>
	 <div class="form-group">
	    <select name="assign_role" class="form-control">
	  		@if($category->cat_role==0)
	  		<option value="{{ $category->cat_role }}" disabled="disabled" selected="selected">Parent</option>
	  		@else
	  		<option value="{{ $category->cat_role }}" disabled="disabled" selected="selected">Child</option>
	  		@endif
	  		<option value="0">Parent</option>
	  		<option value="1">Child</option>
	  	</select>
	  	{{ csrf_field() }}	
	  </div>
	  <input type="submit" value="Submit" class="btn btn-primary btn-sm">
	</form>
</div>
@endsection