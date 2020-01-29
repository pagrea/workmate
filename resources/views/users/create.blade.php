@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
<h3 align="center">Register New staff </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="{{route('user.store')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                            <label for="EmployeeID" class="col-md-2 col-form-label text-md-right">Employee ID<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="EmployeeID" 
                                       type="text" 
                                       class="form-control @error('EmployeeID') is-invalid @enderror" 
                                       name="EmployeeID" 
                                       value="{{ old('EmployeeID') }}" 
                                       required autocomplete="EmployeeID" 
                                       autofocus >
                                @error('EmployeeID')
                                    <span class="invalid-feedback" role="alert">
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
                                       value="{{ old('FirstName') }}" 
                                       required autocomplete="FirstName" 
                                       autofocus >
                                @error('FirstName')
                                    <span class="invalid-feedback" role="alert">
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
                                       value="{{ old('LastName') }}" 
                                       required autocomplete="LastName" 
                                       autofocus >
                                @error('LastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Dob" class="col-md-2 col-form-label text-md-right">Date of Birth<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="Dob" 
                                       type="date" 
                                       class="form-control @error('Dob') is-invalid @enderror" 
                                       name="Dob" 
                                       value="{{ old('Dob') }}" 
                                       required autocomplete="Dob" 
                                       autofocus >
                                @error('Dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-2 col-form-label text-md-right">Gender<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="Gender" required name="Gender" class="form-control @error('Gender') is-invalid @enderror"/>
                            <option value="{{ old('Gender') }}" >{{ old('Gender') }}</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       </select>
                                       @error('Gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="JobTitle" class="col-md-2 col-form-label text-md-right">Job Title<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="JobTitle" 
                                       type="text" 
                                       class="form-control @error('JobTitle') is-invalid @enderror" 
                                       name="JobTitle" 
                                       value="{{ old('JobTitle') }}" 
                                       required autocomplete="JobTitle" 
                                       autofocus >
                                @error('JobTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="highest_education_level" class="col-md-2 col-form-label text-md-right">Highest Education Level<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="highest_education_level" required name="highest_education_level" class="form-control @error('highest_education_level') is-invalid @enderror"/>
                            <option value="{{ old('highest_education_level') }}">{{ old('highest_education_level') }}</option>
                                       <option value="Doctor of Philosophy(PhD)">Doctor of Philosophy(PhD)</option>
                                       <option value="Masters">Masters</option>
                                       <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                                       <option value="Bachelor">Bachelor</option>
                                       <option value="Diploma">Advanced Diploma</option>
                                       <option value="CPA">CPA</option>
                                       <option value="Diploma">Diploma</option>
                                       <option value="Certificate">Certificate</option>
                                       <option value="Certificate of Secondary Education">Advanced Certificate of Secondary Education</option>
                                       <option value="Separated">Certificate of Secondary Education</option>
                                       <option value="Primary Education">Primary Education</option>
                                       </select>
                                       @error('highest_education_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DateOfEmployment" class="col-md-2 col-form-label text-md-right">Date Of Employment<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="DateOfEmployment" 
                                       type="date" 
                                       class="form-control @error('DateOfEmployment') is-invalid @enderror" 
                                       name="DateOfEmployment" 
                                       value="{{ old('DateOfEmployment') }}" 
                                       required autocomplete="DateOfEmployment" 
                                       autofocus >
                                @error('DateOfEmployment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="DateOfLastPromotion" class="col-md-2 col-form-label text-md-right">Date Of LastPromotion</label>
                            <div class="col-md-6">
                                <input id="DateOfLastPromotion" 
                                       type="date" 
                                       class="form-control @error('DateOfLastPromotion') is-invalid @enderror" 
                                       name="DateOfLastPromotion" 
                                       value="{{ old('DateOfLastPromotion') }}" 
                                      autocomplete="DateOfLastPromotion" 
                                       autofocus >
                                @error('DateOfLastPromotion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="MaritalStatus" class="col-md-2 col-form-label text-md-right">Marital Status<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="MaritalStatus" required name="MaritalStatus" class="form-control @error('MaritalStatus') is-invalid @enderror"/>
                            <option value="{{ old('MaritalStatus') }}" >{{ old('MaritalStatus') }}</option>
                                       <option value="Married">Married</option>
                                       <option value="Single">Single</option>
                                       <option value="Divoced">Divoced</option>
                                       <option value="Separated">Separated</option>
                                       </select>
                                       @error('MaritalStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LeaveBalance" class="col-md-2 col-form-label text-md-right">LeaveBalance<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="LeaveBalance" 
                                       type="text" 
                                       class="form-control @error('LeaveBalance') is-invalid @enderror" 
                                       name="LeaveBalance" 
                                       value="{{ old('LeaveBalance') }}" 
                                       required autocomplete="LeaveBalance" 
                                       autofocus >
                                @error('LeaveBalance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="Nationality" class="col-md-2 col-form-label text-md-right">Nationality<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="Nationality" 
                                       type="text" 
                                       class="form-control @error('Nationality') is-invalid @enderror" 
                                       name="Nationality" 
                                       value="{{ old('Nationality') }}" 
                                       required autocomplete="Nationality" 
                                       autofocus >
                                @error('Nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NationalIDNum" class="col-md-2 col-form-label text-md-right">National ID Number</label>
                            <div class="col-md-6">
                                <input id="NationalIDNum" 
                                       type="text" 
                                       class="form-control @error('NationalIDNum') is-invalid @enderror" 
                                       name="NationalIDNum" 
                                       value="{{ old('NationalIDNum') }}" 
                                       autocomplete="NationalIDNum" 
                                       autofocus >
                                @error('NationalIDNum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="BirthCertificateNum" class="col-md-2 col-form-label text-md-right">Birth Certificate Number</label>
                            <div class="col-md-6">
                                <input id="BirthCertificateNum" 
                                       type="text" 
                                       class="form-control @error('BirthCertificateNum') is-invalid @enderror" 
                                       name="BirthCertificateNum" 
                                       value="{{ old('BirthCertificateNum') }}" 
                                     autocomplete="BirthCertificateNum" 
                                       autofocus >
                                @error('BirthCertificateNum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CurrentStatus" class="col-md-2 col-form-label text-md-right">Current Status<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="CurrentStatus" required name="CurrentStatus" class="form-control @error('CurrentStatus') is-invalid @enderror"/>
                                  <option value="{{ old('CurrentStatus') }}">{{ old('CurrentStatus') }}</option>
                                  <option value="Present">Present</option>
                                  <option value="On paid Leave">On paid Leave</option>
                                  <option value="On paid Leave">On unpaid Leave</option>
                                  <option value="On paid Leave">Suspended</option>
                                  <option value="On paid Leave">Inactive</option>
                                   <option value="Dismissed">Dismissed</option>
                             </select>
                                       @error('CurrentStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Department" class="col-md-2 col-form-label text-md-right">Department<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="Department" required name="Department" class="form-control @error('Department') is-invalid @enderror"/>
                                  <option value="{{ old('Department') }}">{{ old('Department') }}</option>
                                  @foreach($departments as $department)
                                       <option value="{{$department->DepartmentName}}">{{$department->DepartmentName}}</option>
                                    @endforeach
                             </select>
                                       @error('Department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="AbsorbedInNIMR" class="col-md-2 col-form-label text-md-right">Absorbed In NIMR<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="AbsorbedInNIMR" required name="AbsorbedInNIMR" class="form-control @error('AbsorbedInNIMR') is-invalid @enderror"/>
                                  <option value="{{ old('AbsorbedInNIMR') }}">{{ old('AbsorbedInNIMR') }}</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                             </select>
                                       @error('AbsorbedInNIMR')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">E-mail Address<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="email" 
                                       type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required autocomplete="email" 
                                       autofocus >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="OtherEmail" class="col-md-2 col-form-label text-md-right">Other E-mail Address</label>
                            <div class="col-md-6">
                                <input id="OtherEmail" 
                                       type="text" 
                                       class="form-control @error('OtherEmail') is-invalid @enderror" 
                                       name="OtherEmail" 
                                       value="{{ old('OtherEmail') }}" 
                                       autocomplete="OtherEmail" 
                                       autofocus >
                                @error('OtherEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="PhoneNumber" class="col-md-2 col-form-label text-md-right">PhoneNumber</label>
                            <div class="col-md-6">
                                <input id="PhoneNumber" 
                                       type="text" 
                                       class="form-control @error('PhoneNumber') is-invalid @enderror" 
                                       name="PhoneNumber" 
                                       value="{{ old('PhoneNumber') }}" 
                                       autocomplete="PhoneNumber" 
                                       autofocus >
                                @error('PhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="EmegencyContantPerson" class="col-md-2 col-form-label text-md-right">Emegency Contant Person</label>
                            <div class="col-md-6">
                                <input id="EmegencyContantPerson" 
                                       type="text" 
                                       class="form-control @error('EmegencyContantPerson') is-invalid @enderror" 
                                       name="EmegencyContantPerson" 
                                       value="{{ old('EmegencyContantPerson') }}" 
                                       autocomplete="EmegencyContantPerson" 
                                       autofocus >
                                @error('EmegencyContantPerson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="EmegencyContactNumber" class="col-md-2 col-form-label text-md-right">Emegency Contact Number</label>
                            <div class="col-md-6">
                                <input id="EmegencyContactNumber" 
                                       type="text" 
                                       class="form-control @error('EmegencyContactNumber') is-invalid @enderror" 
                                       name="EmegencyContactNumber" 
                                       value="{{ old('EmegencyContactNumber') }}" 
                                       autocomplete="EmegencyContactNumber" 
                                       autofocus >
                                @error('EmegencyContactNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffCurrentAddress" class="col-md-2 col-form-label text-md-right">Staff Current Address</label>
                            <div class="col-md-6">
                                <input id="StaffCurrentAddress" 
                                       type="text" 
                                       class="form-control @error('StaffCurrentAddress') is-invalid @enderror" 
                                       name="StaffCurrentAddress" 
                                       value="{{ old('StaffCurrentAddress') }}" 
                                       autocomplete="StaffCurrentAddress" 
                                       autofocus >
                                @error('StaffCurrentAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="StaffHomeAddress" class="col-md-2 col-form-label text-md-right">Staff Home Address</label>
                            <div class="col-md-6">
                                <input id="StaffHomeAddress" 
                                       type="text" 
                                       class="form-control @error('StaffHomeAddress') is-invalid @enderror" 
                                       name="StaffHomeAddress" 
                                       value="{{ old('StaffHomeAddress') }}" 
                                       autocomplete="StaffHomeAddress" 
                                       autofocus >
                                @error('StaffHomeAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="password" value="Changem3">
                        <input type="hidden" name="password_confirmation" value="Changem3">
                   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
