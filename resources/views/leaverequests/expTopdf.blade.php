
<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
 <!-- Jumbotron -->
 <div class="jumbotron">
      <h2>NIMR-Mbeya Medical Research center<BR></h2>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>
    </th>

    <th>
    Leave Request Information for 
    @foreach($requestname as $requestnames)
  {{$requestnames->FirstName}} {{$requestnames->LastName}}
  @endforeach
    </th>
  </tr>
  </thead>
  <tbody>
  <tr><td>ID: </td><td>{{$leaverequests->id}}</td></tr>
  <tr><td>Employee ID:</td><td>{{$leaverequests->EmployeeID}}</td></tr>
  @foreach($requestname as $requestnames)
  <tr><td>Name:</td><td>{{$requestnames->FirstName}} {{$requestnames->LastName}}</td></tr>
  @endforeach
  <tr><td>Department Name:</td><td>{{$leaverequests->DepartmentID}}</td></tr>
 
  <tr><td>Request Date:</td><td>{{$leaverequests->RequestDate}}</td></tr>
  <tr><td>Start Date:</td><td>{{$leaverequests->StartDate}}</td></tr>
  <tr><td>Days Requested:</td><td>{{$leaverequests->DaysRequested}}</td></tr>
  <tr><td>Reporting Date:</td><td>{{$leaverequests->EndDate}}</td></tr>
  <tr><td>Type Of Leave:</td><td>{{$leaverequests->TypeOfLeave}}</td></tr>
  @foreach($requestsubstitute as $requestsubstitutes)
  <tr><td>Substitute:</td><td>{{$requestsubstitutes->FirstName}} {{$requestsubstitutes->LastName}} (ID: {{$requestsubstitutes->EmployeeID}} )</td></tr>
  @endforeach
  <tr><td>Contact Telephone Number:</td><td>{{$leaverequests->ContactTelephone}}</td></tr>
  <tr><td>Request Status:</td><td>{{$leaverequests->RequestStatus}}</td></tr>
  <tr><td>Days Approved:</td><td>{{$leaverequests->DaysApproved}}</td></tr>
  <tr><td>Decline Reason:</td><td>{{$leaverequests->decline_reason}}</td></tr>
  <tr><td>Updated By:</td><td>{{$leaverequests->UpdatedBy}}</td></tr>
  <tr><td>Updated at:</td><td>{{$leaverequests->updated_at}}</td></tr>
  </tbody>
</table>
</div>

