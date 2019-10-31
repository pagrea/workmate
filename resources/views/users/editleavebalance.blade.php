@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">


<h3 align="center">Edit Leave Balance </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="/updateleavebalance" method="post">
                {!! csrf_field() !!}
                <div class="form-group row">
                            <label for="EmployeeID" class="col-md-2 col-form-label text-md-right">Employee ID<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EmployeeID" 
                                       type="text" 
                                       class="form-control @error('EmployeeID') is-invalid @enderror" 
                                       name="EmployeeID" 
                                       value="{{$users->EmployeeID}}" 
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
                                       value="{{$users->FirstName}}" 
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
                                       value="{{$users->LastName}}" 
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
                                       value="{{$users->LeaveBalance}}" 
                                       required autocomplete="LeaveBalance" 
                                       autofocus >
                                @error('LeaveBalance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
                            </div>
                        </div>
                        <a class="pull-left btn btn-primary" href="/staffleavebalance">Back</a>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
