@extends('admin.layout.adminLayout')

@section('content')
<div class="col-lg-12">
	{!! Form::open(['url'=>'#', 'class'=>'form-horizontal', 'id'=>'bannerForm', 'files'=>true]) !!}
	<div class="form-group">
		{!! Form::file('file', null, ['class' => 'form-control'])!!}
	</div>
	<div class="form-group">
		{!! Form::text('heading', null, ['class' => 'form-control', 'placeholder'=>'Add Heading'])!!}
	</div>
	<div class="form-group">
		{!! Form::text('started_url', null, ['class' => 'form-control', 'placeholder'=>'Get Started Url'])!!}
	</div>
	<div class="form-group">
		{!! Form::text('project_url', null, ['class' => 'form-control', 'placeholder'=>'Our Project Url'])!!}
	</div>
		{!! Form::token() !!}	
		{!! Form::submit('Submit',['class'=>'btn btn-primary btn-sm'])!!}

	{!! Form::close() !!}
</div>



@endsection