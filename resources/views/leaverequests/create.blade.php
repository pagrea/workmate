@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

      @if (session()->has('errors2'))
<div class="alert alert-dismissable alert-danger col-md-12 col-lg-9">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
          </button>
    <strong>{!! session()->get('errors2') !!} </strong>

     </div>
@endif

      <head>
    <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("EndDate2").value);
                var pickdt = new Date(document.getElementById("StartDate2").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("EndDate2")){
            document.getElementById("DaysRequested2").value=GetDays();
        }  
    }

    </script>
</head>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
<h3 align="center">Leave Request </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="{{route('leaverequests.store')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                            <label for="EmployeeID" class="col-md-2 col-form-label text-md-right">Employee ID<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EmployeeID" 
                                       type="text" 
                                       class="form-control @error('EmployeeID') is-invalid @enderror" 
                                       name="EmployeeID" 
                                       value="{{$User->EmployeeID}}" 
                                       required readonly autocomplete="EmployeeID" 
                                       autofocus >
                                @error('EmployeeID')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FirstName" class="col-md-2 col-form-label text-md-right">First Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="FirstName" 
                                       type="text" 
                                       class="form-control @error('FirstName') is-invalid @enderror" 
                                       name="FirstName" 
                                       value="{{$User->FirstName}}" 
                                       required disabled autocomplete="FirstName" 
                                       autofocus >
                                @error('FirstName')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LastName" class="col-md-2 col-form-label text-md-right">Last Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="LastName" 
                                       type="text" 
                                       class="form-control @error('LastName') is-invalid @enderror" 
                                       name="LastName" 
                                       value="{{$User->LastName}}" 
                                       required disabled autocomplete="LastName" 
                                       autofocus >
                                @error('LastName')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LeaveBalance" class="col-md-2 col-form-label text-md-right">Leave Balance<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="LeaveBalance" 
                                       type="text" 
                                       class="form-control @error('LeaveBalance') is-invalid @enderror" 
                                       name="LeaveBalance" 
                                       value="{{$User->LeaveBalance}}" 
                                       required readonly autocomplete="LeaveBalance" 
                                       autofocus >
                                @error('LeaveBalance')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DepartmentID" class="col-md-2 col-form-label text-md-right">Department Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="DepartmentID" 
                                       type="text" 
                                       class="form-control @error('DepartmentID') is-invalid @enderror" 
                                       name="DepartmentID" 
                                       value="{{$User->Department}}" 
                                       required readonly autocomplete="DepartmentID" 
                                       autofocus >
                                @error('DepartmentID')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="TypeOfLeave" class="col-md-2 col-form-label text-md-right">TypeOfLeave<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="TypeOfLeave" required name="TypeOfLeave" class="form-control @error('Substitute') is-invalid @enderror"/>
                                  <option value="{{ old('TypeOfLeave') }}">{{ old('TypeOfLeave') }}</option>
                                  <option value="Annual">Annual</option>
                                  <option value="Emergence">Emergence</option>
                                  <option value="Matenity Leave">Maternity</option>
                                  <option value="Patenity Leave">Paternity</option>
                                  <option value="Sick">Sick</option>
                                  <option value="Overtime Compensation">Overtime Compensation</option>
                                  <option value="compassionate">compassionate</option>
                                  <option value="Overtime Compensation">Other</option>

                                  
                             </select>
                                       @error('TypeOfLeave alert-danger')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StartDate" class="col-md-2 col-form-label text-md-right">Start Date<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="StartDate2" 
                                       type="date" 
                                       class="form-control @error('StartDate') is-invalid @enderror" 
                                       name="StartDate" 
                                       value="{{ old('StartDate') }}" 
                                       required autocomplete="StartDate" 
                                       onchange="cal()"
                                       autofocus >
                                @error('StartDate')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="EndDate" class="col-md-2 col-form-label text-md-right">Reporting Date<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EndDate2" 
                                       type="date" 
                                       class="form-control @error('EndDate') is-invalid @enderror" 
                                       name="EndDate" 
                                       value="{{ old('EndDate') }}" 
                                       required autocomplete="EndDate" 
                                       onchange="cal()"
                                       autofocus >
                                @error('EndDate')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DaysRequested" class="col-md-2 col-form-label text-md-right">Number of Days Requested<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="DaysRequested2" 
                                       type="text" 
                                       class="form-control @error('DaysRequested') is-invalid @enderror" 
                                       name="DaysRequested" 
                                       readonly value="{{ old('DaysRequested') }}" 
                                       required autocomplete="DaysRequested" 
                                       autofocus >
                                @error('DaysRequested')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Substitute" class="col-md-2 col-form-label text-md-right">Substitute<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="Substitute" required name="Substitute" class="form-control @error('Substitute') is-invalid @enderror"/>
                                  <option value="{{ old('Substitute') }}">{{ old('Substitute') }}</option>
                                  @foreach($deptstaff as $deptstaffs)
                                       <option value="{{$deptstaffs->EmployeeID}}">{{$deptstaffs->FirstName}} {{$deptstaffs->LastName}}</option>
                                    @endforeach
                             </select>
                                       @error('Substitute')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ContactTelephone" class="col-md-2 col-form-label text-md-right">Contact Telephone Number<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="ContactTelephone" 
                                       type="text" 
                                       class="form-control @error('ContactTelephone') is-invalid @enderror" 
                                       name="ContactTelephone" 
                                       value="{{$User->PhoneNumber}}" 
                                       required autocomplete="ContactTelephone" 
                                       autofocus >
                                @error('ContactTelephone')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   submit
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
