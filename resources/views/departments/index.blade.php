@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/departments" method="get">
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
    
  </tr>
  </thead>
  <tbody>
    @foreach($department as $departments)
      <tr>
        <td><a href="/departments/{{$departments->id}}/edit">{{$departments->id}}</a></td>
        <td><a href="/departments/{{$departments->id}}/edit">{{$departments->DepartmentName}}</a></td>
        <td><a href="/departments/{{$departments->id}}/edit">{{$departments->DepartmentDescription}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $department->links() }}

</div>
</div>

@stop