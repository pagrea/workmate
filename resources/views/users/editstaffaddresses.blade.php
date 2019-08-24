@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">


<h3 align="center">Edit Staff Addresses </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="/updatestaffaddresses" method="post">
                {!! csrf_field() !!}
                <div class="form-group row">
                            <label for="EmployeeID" class="col-md-2 col-form-label text-md-right">EmployeeID/ Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            @foreach($useraddr as $useraddress)
                            <select id="EmployeeID" required name="EmployeeID" class="form-control @error('EmployeeID') is-invalid @enderror"/>
                                  <option value="{{$useraddress->EmployeeID}}">{{$useraddress->EmployeeID}}</option>
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
                            <label for="StaffCurrentAddress" class="col-md-2 col-form-label text-md-right">Staff Current Address<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="StaffCurrentAddress" 
                                       type="text" 
                                       class="form-control @error('StaffCurrentAddress') is-invalid @enderror" 
                                       name="StaffCurrentAddress" 
                                       value="{{$useraddress->StaffCurrentAddress}}" 
                                       required autocomplete="StaffCurrentAddress" 
                                       autofocus >
                                @error('StaffCurrentAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffHomeAddress" class="col-md-2 col-form-label text-md-right">Staff Home Address<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="StaffHomeAddress" 
                                       type="text" 
                                       class="form-control @error('StaffHomeAddress') is-invalid @enderror" 
                                       name="StaffHomeAddress" 
                                       value="{{$useraddress->StaffHomeAddress}}" 
                                       required autocomplete="StaffHomeAddress" 
                                       autofocus >
                                @error('StaffHomeAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="HomeRegion" class="col-md-2 col-form-label text-md-right">Home Region<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="HomeRegion" 
                                       type="text" 
                                       class="form-control @error('HomeRegion') is-invalid @enderror" 
                                       name="HomeRegion" 
                                       value="{{$useraddress->HomeRegion}}" 
                                       required autocomplete="HomeRegion" 
                                       autofocus >
                                @error('HomeRegion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="HomeDistrict" class="col-md-2 col-form-label text-md-right">Home District<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="HomeDistrict" 
                                       type="text" 
                                       class="form-control @error('HomeDistrict') is-invalid @enderror" 
                                       name="HomeDistrict" 
                                       value="{{$useraddress->HomeDistrict}}" 
                                       required autocomplete="HomeDistrict" 
                                       autofocus >
                                @error('HomeDistrict')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffTelephone1" class="col-md-2 col-form-label text-md-right">Staff Telephone1<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="StaffTelephone1" 
                                       type="text" 
                                       class="form-control @error('StaffTelephone1') is-invalid @enderror" 
                                       name="StaffTelephone1" 
                                       value="{{$useraddress->StaffTelephone1}}" 
                                       required autocomplete="StaffTelephone1" 
                                       autofocus >
                                @error('StaffTelephone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffTelephone2" class="col-md-2 col-form-label text-md-right">Staff Telephone2<span class="required"></span></label>
                            <div class="col-md-6">
                                <input id="StaffTelephone2" 
                                       type="text" 
                                       class="form-control @error('StaffTelephone2') is-invalid @enderror" 
                                       name="StaffTelephone2" 
                                       value="{{$useraddress->StaffTelephone2}}" 
                                       autocomplete="StaffTelephone2" 
                                       autofocus >
                                @error('StaffTelephone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffTelephone3" class="col-md-2 col-form-label text-md-right">Staff Telephone3<span class="required"></span></label>
                            <div class="col-md-6">
                                <input id="StaffTelephone3" 
                                       type="text" 
                                       class="form-control @error('StaffTelephone3') is-invalid @enderror" 
                                       name="StaffTelephone3" 
                                       value="{{$useraddress->StaffTelephone3}}" 
                                       autocomplete="StaffTelephone3" 
                                       autofocus >
                                @error('StaffTelephone3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffEmail1" class="col-md-2 col-form-label text-md-right">Staff Email1<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                           
                                <input id="StaffEmail1" 
                                       type="email" 
                                       class="form-control @error('StaffEmail1') is-invalid @enderror" 
                                       name="StaffEmail1"                              
                                       value="{{$useraddress->StaffEmail1}}" 
                                   
                                       required autocomplete="StaffEmail1" 
                                       autofocus >

                                @error('StaffEmail1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffEmail2" class="col-md-2 col-form-label text-md-right">Staff Email2</label>
                            <div class="col-md-6">
                                <input id="StaffEmail2" 
                                       type="text" 
                                       class="form-control @error('StaffEmail2') is-invalid @enderror" 
                                       name="StaffEmail2" 
                                       value="{{$useraddress->StaffEmail2}}" 
                                      autocomplete="StaffEmail2" 
                                       autofocus >
                                @error('StaffEmail2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="EmegencyContantPerson" class="col-md-2 col-form-label text-md-right">Emegency Contant Person<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EmegencyContantPerson" 
                                       type="text" 
                                       class="form-control @error('EmegencyContantPerson') is-invalid @enderror" 
                                       name="EmegencyContantPerson" 
                                       value="{{$useraddress->EmegencyContantPerson}}" 
                                       required autocomplete="EmegencyContantPerson" 
                                       autofocus >
                                @error('EmegencyContantPerson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="EmegencyContactNumber" class="col-md-2 col-form-label text-md-right">Emegency Contact Number<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EmegencyContactNumber" 
                                       type="text" 
                                       class="form-control @error('EmegencyContactNumber') is-invalid @enderror" 
                                       name="EmegencyContactNumber" 
                                       value="{{$useraddress->EmegencyContactNumber}}" 
                                       required autocomplete="EmegencyContactNumber" 
                                       autofocus >
                                @error('EmegencyContactNumber')
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
                                @endforeach
            </form>
           
           
    @stop
