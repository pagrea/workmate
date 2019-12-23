@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/staffaddresses" method="get">
  <H3 align="center"><b>Staff Address information</b></H3>
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
    <th>Home Address</th>
    <th>Email1</th>
    <th>Telephone1</th>
    <th>ContantPerson</th>
    <th>ContantPersonNumber</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->EmployeeID}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->FirstName}} {{$user->LastName}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->StaffHomeAddress}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->StaffEmail1}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->StaffTelephone1}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->EmegencyContantPerson}}</a></td>
        <td><a href="/editstaffaddresses/{{$user->EmployeeID}}">{{$user->EmegencyContactNumber}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop