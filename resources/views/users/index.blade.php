@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/user" method="get">
  <H3 align="center"><b>Staffs Information</b></H3>
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
    <th>Email</th>
    <th>Dob</th>
    <th>PayrollDepartment</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td><a href="/user/{{$user->id}}/edit">{{$user->EmployeeID}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->FirstName}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->LastName}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->Gender}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->JobTitle}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->email}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->Dob}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->PayrollDepartment}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop