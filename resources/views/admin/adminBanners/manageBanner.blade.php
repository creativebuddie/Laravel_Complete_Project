@extends('admin.layout.adminLayout')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Manage Admin Banners</strong>
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Banner Heading</th>
        <th>Started Url</th>
        <th>Project Url</th>
        <th>Status</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($banner as $adminbanner)	
      <tr>
        <td>{{ $adminbanner->banner_heading }}</td>
        <td>{{ $adminbanner->get_started_url }}</td>
        <td>{{ $adminbanner->our_project_url }}</td>
        <td class="text-center"><span class="badge badge-success"><a href="javascript:void(0)" id="{{ $adminbanner->id }}" onclick="genericStatus(this.id, 'banners');">{{ $adminbanner->status }}</a></span></td>
		<td class="text-center"><a href='{{ url("adminBanners/edit/{$adminbanner->id}") }}'><i class="fa fa-edit"></i></a></td>
		<td class="text-center"><a href='{{ url("adminBanners/destroy/{$adminbanner->id}") }}'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      </tr>
    @endforeach 
    </tbody>
  </table>
        </div>
    </div>
</div>
@endsection
