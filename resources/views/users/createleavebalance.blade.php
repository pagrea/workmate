@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">


<h3 align="center">Fill Staff Leave Balance </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="/storeleavebalance" method="post">
                {!! csrf_field() !!}
                <div class="form-group row">
                            <label for="EmployeeID" class="col-md-2 col-form-label text-md-right">EmployeeID/ Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="EmployeeID" required name="EmployeeID" class="form-control @error('EmployeeID') is-invalid @enderror"/>
                                  <option value="{{ old('EmployeeID') }}">{{ old('EmployeeID') }}</option>
                                  @foreach($user as $users)
                                       <option value="{{$users->EmployeeID}}">{{$users->FirstName}} {{$users->LastName}}</option>
                                    @endforeach
                             </select>
                                       @error('EmployeeID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Balance" class="col-md-2 col-form-label text-md-right">Leave Balance<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="Balance" 
                                       type="text" 
                                       class="form-control @error('Balance') is-invalid @enderror" 
                                       name="Balance" 
                                       value="{{ old('Balance') }}" 
                                       required autocomplete="Balance" 
                                       autofocus >
                                @error('Balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
