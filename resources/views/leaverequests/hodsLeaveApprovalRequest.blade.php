@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/hodsLeaveApprovalRequest" method="get">
  <H3 align="center"><b>HODs Leave Approval Request</b></H3>
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
    <th>Name</th>
    <th>StartDate</th>
    <th>DaysRequested</th>
    <th>EndDate</th>
    <th>TypeOfLeave</th>
    <th>LeaveBalance</th>
    <th>Action</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($leaverequests as $leaverequest)
      <tr>
        <td>{{$leaverequest->EmployeeID}}</td>
        <td>{{$leaverequest->FirstName}} {{$leaverequest->LastName}}</td>
        <td>{{$leaverequest->StartDate}}</td>
        <td>{{$leaverequest->DaysRequested}}</td>
        <td>{{$leaverequest->EndDate}}</td>
        <td>{{$leaverequest->TypeOfLeave}}</td>
        <td>{{$leaverequest->LeaveBalance}}</td>
        <td>
        <a onclick='return confirm("Are you sure You want to Approve this Leave request?? Click Ok to continue or Click Cancel to Cancel")' class="pull-center btn btn-primary btn-sm" href="/cdAccept/{{$leaverequest->id}}" role="button">Accept</a>
        <a class="pull-center btn btn-primary btn-sm" href="/cdDeclinefrm/{{$leaverequest->id}}" role="button">Decline</a>
     
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $leaverequests->links() }}

</div>
</div>

@stop