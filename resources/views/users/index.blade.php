@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-12 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/user" method="get">
  <a class="pull-left btn btn-primary " href="/user/create">Register New Staff</a><br>
  <a class="pull-right btn btn-primary" href="/Exportstaffdata" role="button">Export to Excel</a>
  <H3 align="center"><b>Staff Information</b></H3>
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
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>JobTitle</th>
    <th>Department</th>
    <th>Email</th>
    <th>Action</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->EmployeeID}}</td>
        <td>{{$user->FirstName}}</td>
        <td>{{$user->LastName}}</td>
        <td>{{$user->Gender}}</td>
        <td>{{$user->JobTitle}}</td>
        <td>{{$user->Department}}</td>
        <td>{{$user->email}}</td>
        <td>
        <a class="pull-center btn btn-primary btn-sm" href="/user/{{$user->id}}" role="button">View more</a>
        <a class="pull-center btn btn-primary btn-sm" href="/user/{{$user->id}}/edit" role="button">Edit</a>
       
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop