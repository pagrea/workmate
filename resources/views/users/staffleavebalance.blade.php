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
    
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td><a href="/editleavebalance/{{$user->EmployeeID}}">{{$user->EmployeeID}}</a></td>
        <td><a href="/editleavebalance/{{$user->EmployeeID}}">{{$user->FirstName}} {{$user->LastName}}</a></td>
        <td><a href="/editleavebalance/{{$user->EmployeeID}}">{{$user->Balance}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}

</div>
</div>

@stop