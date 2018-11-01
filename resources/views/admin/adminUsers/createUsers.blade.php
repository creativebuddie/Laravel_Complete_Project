@extends('admin.layout.adminLayout')

@section('content')
<div class="col-lg-12">
	<form  method="POST" action="{{ url('adminUsers/store') }}" class="form-horizontal" enctype="multipart/form-data">
	  <div class="form-group">
	    <input type="file" name="picture[]" class="form-control" multiple>
	  </div<div class="form-group">
	    <input type="text" name="name" class="form-control" placeholder="Add Name">
	  </div>
	  <div class="form-group">
	    <input type="text" name="email" class="form-control" placeholder="Add Email">
	  </div>
	  <div class="form-group">
	    <input type="password" name="password" class="form-control" placeholder="Set Password">
	  </div>
	  <div class="form-group">
	    <input type="text" name="phone" class="form-control" placeholder="Add phone">
	  </div>
	  <div class="form-group">
	    <input type="text" name="dob" class="form-control" placeholder="Add DOB">
	  </div>
	  <div class="form-group">
	    <input type="text" name="desgination" class="form-control" placeholder="Desgination">
	  </div>
	  <div class="form-group">
	    <select name="assign_role" class="form-control">
	  		<option disabled="disabled" selected="selected">Assign Role</option>
	  		<option value="1">Administrator</option>
	  		<option value="2">Editor</option>
	  		<option value="3">Subscriber</option>
	  		<option value="4">Author</option>
	  	</select>
	  </div>
	  <div class="row form-group">
			<div class="col col-md-3"><label class=" form-control-label">Permissions</label></div>
			<div class="col col-md-9">
			  <div class="form-check">
					<div class="checkbox">
					  <label for="checkbox1" class="form-check-label ">
						<input id="permission_create" name="permission[]" value="create" class="form-check-input" type="checkbox">Create
					  </label>
					</div>
					<div class="checkbox ">
					  <label for="checkbox1" class="form-check-label ">
						<input id="permission_manage" name="permission[]" value="manage" class="form-check-input" type="checkbox">Manage
					  </label>
					</div>

					<div class="checkbox manage-permission ">
					  <label for="checkbox1" class="form-check-label ">
						<input id="permission_view" name="manage_permission[]" value="view" class="form-check-input manage-crud" type="checkbox">View
					  </label>
					</div>
					<div class="checkbox manage-permission">
					  <label for="checkbox2" class="form-check-label ">
						<input id="permission_edit" name="manage_permission[]" value="edit" class="form-check-input manage-crud" type="checkbox">Edit
					  </label>
					</div>
					<div class="checkbox manage-permission">
					  <label for="checkbox3" class="form-check-label ">
						<input id="permission_delete" name="manage_permission[]" value="delete" class="form-check-input manage-crud" type="checkbox">Delete
					  </label>
					</div>
			  </div>
			</div>
		</div>
		{{ csrf_field() }}	
	  	<input type="submit" value="Submit" class="btn btn-primary btn-sm">
	</form>
</div>
@endsection