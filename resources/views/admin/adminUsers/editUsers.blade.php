@extends('admin.layout.adminLayout')

@section('content')
<div class="col-lg-12">
	<form  method="POST" action="{{ url('adminUsers/update', array($admin->id)) }}" class="form-horizontal">
	  <div class="form-group">
	    <input type="text" name="name" class="form-control" placeholder="Add Name" value="{{ $admin->admin_name }}">
	  </div>
	  <div class="form-group">
	    <input type="text" name="email" class="form-control" placeholder="Add Email" value="{{ $admin->admin_email }}">
	  </div>
	  <div class="form-group">
	    <input type="text" name="phone" class="form-control" placeholder="Add phone" value="{{ $admin->admin_phone }}">
	  </div>
	  <div class="form-group">
	    <input type="text" name="dob" class="form-control" placeholder="Add DOB" value="{{ $admin->admin_dob }}">
	  </div>
	  <div class="form-group">
	    <input type="text" name="desgination" class="form-control" placeholder="Desgination" value="{{ $admin->admin_desgination }}">
	  </div>
	  <div class="form-group">
	    <select name="assign_role" class="form-control">
	  		@if($admin->admin_cur_role==1)
	  			<option value="{{ $admin->admin_cur_role }}" disabled="disabled" selected="selected">Administrator</option>
	  		@elseif($admin->admin_cur_role==2)
	  			<option value="{{ $admin->admin_cur_role }}" disabled="disabled" selected="selected">Editor</option>
	  		@elseif($admin->admin_cur_role==3)
	  			<option value="{{ $admin->admin_cur_role }}" disabled="disabled" selected="selected">Subscriber</option>
	  		@elseif($admin->admin_cur_role==4)
	  			<option value="{{ $admin->admin_cur_role }}" disabled="disabled" selected="selected">Author</option>		
	  		@endif
	  		<option value="1">Administrator</option>
	  		<option value="2">Editor</option>
	  		<option value="3">Subscriber</option>
	  		<option value="4">Author</option>
	  	</select>
	  	{{ csrf_field() }}	
	  </div>
	  <input type="submit" value="Submit" class="btn btn-primary btn-sm">
	</form>
</div>
@endsection