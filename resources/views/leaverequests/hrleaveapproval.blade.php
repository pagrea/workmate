@extends('adminlte::page')
@section('content')

@include('partials.success')
@if (isset($errors) && count($errors) > 0)
<div class="alert alert-dismissable alert-danger col-md-9 col-lg-9">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
          </button>
       
    <strong>{!! $errors !!} </strong>

     </div>
@endif

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <form action="/leaverequests" method="get">
  <H3 align="center"><b>HR Leave Approval</b></H3>
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
                <form action="/hrAccept" method="get">
                <input type="hidden" name="id" value="{{$leaverequest->id}}">
                <input type="hidden" name="EmployeeID" value="{{$leaverequest->EmployeeID}}">
                <input type="hidden" name="DaysRequested" value="{{$leaverequest->DaysRequested}}">
                <input type="hidden" name="TypeOfLeave" value="{{$leaverequest->TypeOfLeave}}">
                <input type="hidden" name="LeaveBalance" value="{{$leaverequest->LeaveBalance}}">
                <button onclick='return confirm("Are you sure You want to Approve As HR?? Click Ok to continue or Click Cancel to Cancel")'
                        type="submit" class="pull-center btn btn-primary btn-sm" 
                        role="button">Accept
                </button>
                <a  class="pull-center btn btn-primary btn-sm" href="/hrDeclinefrm/{{$leaverequest->id}}">Decline</a>

                             </form>
                           
       
     
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $leaverequests->links() }}

</div>
</div>

@stop