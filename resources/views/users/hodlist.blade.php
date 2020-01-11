@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/addhod" method="get">
  Staff Name
  <select class="" required name="staff_id" />
 
      <option value="{{ old('staff_id') }}">{{ old('staff_id') }}</option>
      @foreach($staffNames as $staffName)
            <option value="{{$staffName->id}}">{{$staffName->FirstName}} {{$staffName->LastName}}</option>
            @endforeach
  </select>
 
  <button type="submit" class="btn btn-primary " name="send">
             Add New HOD
            </button>
  </form>

  <form action="/hodlist" method="get">
  <a class="pull-right btn btn-primary" href="/Exporthodlist" role="button">Export to Excel</a><br>
  <H3 align="center"><b>HOD list</b></H3>
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
    <th>UserRole</th>
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
        <td>{{$user->UserRole}}</td>
        <td>
        <a class="pull-center btn btn-primary btn-sm" href="/user/{{$user->id}}" role="button">View</a>
        <a onclick='return confirm("Are you sure You want to remove this staff in the list of HOD?? Click Ok to continue or Click Cancel to Cancel")' class="pull-center btn btn-primary btn-sm" href="/removehod/{{$user->id}}" role="button">Remove</a>
       
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop