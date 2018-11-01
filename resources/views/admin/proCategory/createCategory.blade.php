@extends('admin.layout.adminLayout')
@section('content')
<div class="col-lg-12">
	<form  method="POST" action="{{ url('proCategory/store') }}" class="form-horizontal">
	  <div class="form-group">
	    <input type="text" name="name" class="form-control" placeholder="Add Category">
	  </div>
	   <div class="form-group">
	    <select name="assign_role" class="form-control">
	  		<option disabled="disabled" selected="selected">Assign Role</option>
	  		<option value="0">Parent</option>
	  		<option value="1">Child</option>
	  	</select>
	  </div>
	  <div class="form-group">
	    <select name="par_cat_role" class="form-control">
	    <option disabled="disabled" selected="selected">Select Parent Category</option>	
	  	@foreach($category as $categories)
	  		<option value="{{ $categories->id }}">{{ $categories->cat_name }}</option>
	  	@endforeach
	  	</select>
	  </div>
	 {{ csrf_field() }}	
	 <input type="submit" value="Submit" class="btn btn-primary btn-sm">
	</form>
</div>

@endsection