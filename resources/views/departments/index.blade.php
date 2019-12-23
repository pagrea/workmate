@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/departments" method="get">
  <a class="pull-left btn btn-primary " href="/departments/create">Register New Departments</a><br>
  <H3 align="center"><b>Departments</b></H3>
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
    <th>Department ID</th>
    <th>Depart mentName</th>
    <th>Department Description</th>
    <th>Action</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($department as $departments)
      <tr>
        <td>{{$departments->id}}</td>
        <td>{{$departments->DepartmentName}}</td>
        <td>{{$departments->DepartmentDescription}}</td>
        <td>
        <a class="pull-center btn btn-primary btn-sm" href="/departments/{{$departments->id}}/edit" role="button">Edit</a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $department->links() }}

</div>
</div>

@stop