@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')
<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
      <a class="pull-left btn btn-primary" href="{{ url()->previous() }}" role="button">Back</a>&nbsp;&nbsp;
      @if ($leaverequests->RequestStatus == "Approved by HR")
    <a class="btn btn-primary" href="/exportpdf/{{$leaverequests->id}}" role="button">Export to PDF</a>
    @endif
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Leave Request Details</th>
  </tr>
  </thead>
  <tbody>
  <tr><td>ID </td><td>{{$leaverequests->id}}</td></tr>
  <tr><td>Employee ID</td><td>{{$leaverequests->EmployeeID}}</td></tr>
  @foreach($requestname as $requestnames)
  <tr><td>Name</td><td>{{$requestnames->FirstName}} {{$requestnames->LastName}}</td></tr>
  @endforeach
  <tr><td>Department Name</td><td>{{$leaverequests->DepartmentID}}</td></tr>
  <tr><td>Request Date</td><td>{{$leaverequests->RequestDate}}</td></tr>
  <tr><td>Start Date</td><td>{{$leaverequests->StartDate}}</td></tr>
  <tr><td>Days Requested</td><td>{{$leaverequests->DaysRequested}}</td></tr>
  <tr><td>Reporting Date</td><td>{{$leaverequests->EndDate}}</td></tr>
  <tr><td>Type Of Leave</td><td>{{$leaverequests->TypeOfLeave}}</td></tr>
  @foreach($requestsubstitute as $requestsubstitutes)
  <tr><td>Substitute</td><td>{{$requestsubstitutes->FirstName}} {{$requestsubstitutes->LastName}} (ID: {{$requestsubstitutes->EmployeeID}} )</td></tr>
  @endforeach
  <tr><td>Contact Telephone Number</td><td>{{$leaverequests->ContactTelephone}}</td></tr>
  <tr><td>Request Status</td><td>{{$leaverequests->RequestStatus}}</td></tr>

  <tr><td>Substitute Approval Status</td><td>  @if($leaverequests->substitute_approval != "Pending")   
                                         <span style="background-color:lightgreen; font-weight: bold;">
                                       @endif
                                          {{$leaverequests->substitute_approval}}</span></td></tr>
  <tr><td>Department Approval Status</td><td>  @if($leaverequests->departmental_approval != "Pending")   
                                         <span style="background-color:lightgreen; font-weight: bold;">
                                         @endif
                                          {{$leaverequests->departmental_approval}}</span></td></tr>

  <tr><td>HR Approval Status</td><td> @if($leaverequests->hr_approval != "Pending")   
                                         <span style="background-color:lightgreen; font-weight: bold;">
                                         @endif
                                           {{$leaverequests->hr_approval}}</span></td></tr>

  <tr><td>Days Approved</td><td>{{$leaverequests->DaysApproved}}</td></tr>
  <tr><td>Decline Reason</td><td>{{$leaverequests->decline_reason}}</td></tr>
  <tr><td>Updated By</td><td>{{$leaverequests->UpdatedBy}}</td></tr>
  <tr><td>Updated at</td><td>{{$leaverequests->updated_at}}</td></tr>
  </tbody>
</table>
</div>
@stop

