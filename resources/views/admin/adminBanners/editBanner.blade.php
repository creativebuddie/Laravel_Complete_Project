@extends('admin.layout.adminLayout')

@section('content')
<div class="col-lg-12">
	<form  method="POST" action="{{ url('adminBanners/update', array($banner->id)) }}" class="form-horizontal">
	  <div class="form-group">
	    <input type="text" name="banner_heading" class="form-control" value="{{ $banner->banner_heading }}">
	  </div>

	  <div class="form-group">
	    <input type="text" name="started_url" class="form-control" value="{{ $banner->get_started_url }}">
	  </div>

	  <div class="form-group">
	    <input type="text" name="website_url" class="form-control" value="{{ $banner->our_project_url }}">
	  </div>

	  {{ csrf_field() }}	
	  
	  <input type="submit" value="Submit" class="btn btn-primary btn-sm">
	</form>
</div>
@endsection