@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
   <th>Status</th>
   <th>Last Seen</th>
   <th>Email Verified Status</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @if($user->status == 1)
        <a class="btn btn-secondary" href="{{ route('users.status.update',['user_id' => $user->id, 'status_code' => 0]) }}">Block</a>
        @else
        <a class="btn btn-success" href="{{ route('users.status.update',['user_id' => $user->id, 'status_code' => 1]) }}">Unblock</a>
        @endif
    </td>
    <td>
      @if(Cache::has('is_online' . $user->id))
    <span class="text-success">Online</span>
    @else
    <span class="text-secondary">Offline</span>
    @endif
    </td>
    <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
    @if($user->email_verified_at == null)
    <td class="text-danger">Pending</td>
    @else
    <td class="text-success">Verified</td>
    @endif
  </tr>
 @endforeach
</table>
{!! $data->render() !!}
@endsection