@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/staffleavebalance" method="get">
  <H3 align="center"><b>Staff Leave Balances</b></H3>
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control"  name="Search"
            placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" name="find">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>EmployeeID</th>
    <th>Staff Name</th>
    <th>Balance</th>
    <th>Action</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->EmployeeID}}</td>
        <td>{{$user->FirstName}} {{$user->LastName}}</td>
        <td>{{$user->LeaveBalance}}</td>
        <td><a class="pull-center btn btn-primary btn-sm" href="/editleavebalance/{{$user->id}}" role="button">Edit</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop