@extends('adminlte::page')
@section('content')

@include('partials.errors')
@include('partials.success')

<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
  <div class="panel-body">
  <a class="pull-left btn btn-primary btn-sm" href="/ExportAllstaffsleavehistory">ExportToExcel</a>
  <form action="/employeeleavehistory" method="get">
  <H3 align="center"><b>All Staffs Leave Hstory</b></H3>
    {{ csrf_field() }}
    <table class="table table-bordered" >
<thead>
  <tr>
    <th>Search by Name
                              <select name="Search" />
                                  <option value="{{ old('Search') }}">{{ old('Search') }}</option>
                                  @foreach($staffNames as $staffName)
                                       <option value="{{$staffName->EmployeeID}}">{{$staffName->FirstName}} {{$staffName->LastName}}</option>
                                    @endforeach
                             </select>

 <th>
 StartDate<input type="date" class=""  name="start_date" value="{{ old('start_date') }}"> &nbsp;
 EndDate<input type="date" class=""  name="end_date" value="{{ old('end_date') }}"> &nbsp;
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
    <th>Action</th>
    
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
        <td>
        <a class="pull-center btn btn-primary btn-sm" href="/leaverequests/{{$leaverequest->id}}" role="button">View More</a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
{{ $leaverequests->links() }}

</div>
</div>

@stop