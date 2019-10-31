@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">

  
  <a class="pull-left btn btn-primary btn-sm" href="/personalleavehistoryexport">ExportToExcel</a>
  <form action="/leaverequests" method="get">
  <H3 align="center"><b>My Leave Hstory</b></H3>
    {{ csrf_field() }}
    <table class="table table-bordered" >
<thead>
  <tr>
    <th> <input type="checkbox" class="" name="check1" value="check1">Search by any Category<br>
   <input type="text" class=""  name="Search" placeholder="Search by any Category"> &nbsp;</th>
 <th> <input type="checkbox" class="" name="check2" value="check2">Search By Start date and End date <br>
 StartDate<input type="date" class=""  name="start_date" placeholder="Start date"> &nbsp;
 EndDate<input type="date" class=""  name="end_date" placeholder="End date"> &nbsp;
 <input type="submit" class="btn btn-primary"  name="send" value="Search"></th>
  </tr>
  </thead>
</table>
</form>

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>EmployeeID</th>
    <th>Name</th>
    <th>StartDate</th>
    <th>DaysApproved</th>
    <th>EndDate</th>
    <th>TypeOfLeave</th>
    <th>RequestStatus</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($leaverequests as $leaverequest)
      <tr>
        <td>{{$leaverequest->EmployeeID}}</td>
        <td>{{$leaverequest->FirstName}} {{$leaverequest->LastName}}</td>
        <td>{{$leaverequest->StartDate}}</td>
        <td>{{$leaverequest->DaysApproved}}</td>
        <td>{{$leaverequest->EndDate}}</td>
        <td>{{$leaverequest->TypeOfLeave}}</td>
        <td>{{$leaverequest->RequestStatus}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $leaverequests->links() }}

</div>
</div>

@stop