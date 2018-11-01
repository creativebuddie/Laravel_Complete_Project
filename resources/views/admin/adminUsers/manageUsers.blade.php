@extends('admin.layout.adminLayout')
@section('content')
<?php 
// print $permission;
// exit();
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Manage Admin Users</strong>
        </div>
        <div class="card-body">
  <table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
      <tr>

        <th>File</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>D.O.B</th>
        <th>Desgination</th>
        <th>Current Role</th>
        <th>Status</th>
        @if(in_array('view', json_decode($permission)))
        <th>View</th>
        @endif
        @if(in_array('edit', json_decode($permission)))
        <th>Update</th>
        @endif
        @if(in_array('delete', json_decode($permission)))
        <th>Delete</th>
        @endif
      </tr>
    </thead>
    <tbody>
    @foreach($admin as $adminUsers)	
        <?php $data = json_decode($adminUsers->file); $arraySize = count($data); ?>
        <tr>
        <td>
            @for($i=0; $i<$arraySize; $i++)
            <img src="{{ URL::asset('resources/images/profile') }}/{{ $data[$i] }}" height="50" width="50">
            @endfor
        </td>
        <td>{{ $adminUsers->admin_name }}</td>
        <td>{{ $adminUsers->admin_email }}</td>
        <td>{{ $adminUsers->admin_phone }}</td>
        <td>{{ $adminUsers->admin_dob }}</td>
        <td>{{ $adminUsers->admin_desgination }}</td>
        @if ($adminUsers->admin_cur_role==1)
        <td>Administrator</td>
        @elseif ($adminUsers->admin_cur_role==2)
        <td>Editor</td>
		@elseif ($adminUsers->admin_cur_role==3)
        <td>Subscriber</td>
        @elseif ($adminUsers->admin_cur_role==4)
        <td>Author</td>
        @endif

        <td class="text-center"><span class="badge badge-success"><a href="javascript:void(0)" id="{{ $adminUsers->id }}" onclick="genericStatus(this.id, 'admins');">{{ $adminUsers->admin_status }}</a></span></td>
        @if(in_array('view', json_decode($permission)))
        <td class="text-center"><a href='{{ url("adminUsers/edit/{$adminUsers->id}") }}'><i class="fa fa-eye" aria-hidden="true"></i></a></td>
        @endif
        @if(in_array('edit', json_decode($permission)))
        <td class="text-center"><a href='{{ url("adminUsers/edit/{$adminUsers->id}") }}'><i class="fa fa-edit"></i></a></td>
        @endif
        @if(in_array('delete',  json_decode($permission)))
        <td class="text-center"><a href='{{ url("adminUsers/destroy/{$adminUsers->id}") }}'><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        @endif

      </tr>
    @endforeach 
    </tbody>
  </table>
        </div>
    </div>
</div>
@endsection
