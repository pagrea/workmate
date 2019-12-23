@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')


    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>

                                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                    @endforeach
                    @endif

                    @if (session()->has('message'))
                        <p class="" role="alert">{{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </p>
                    @endif

            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('EmployeeID') ? 'has-error' : '' }}">
                    <input type="text" name="EmployeeID" class="form-control" value="{{ old('EmployeeID') }}"
                           placeholder="{{ trans('adminlte::adminlte.EmployeeID') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('EmployeeID'))
                        <span class="help-block">
                            <strong>{{ $errors->first('EmployeeID') }}</strong>
                        </span>
                    @endif
                </div>

                  
                <div class="form-group has-feedback {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                           placeholder="{{ trans('adminlte::adminlte.first_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                           placeholder="{{ trans('adminlte::adminlte.last_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('Dob') ? 'has-error' : '' }}">
                    <input type="date" name="Dob" class="form-control" value="{{ old('Dob') }}"
                           placeholder="{{ trans('adminlte::adminlte.Dob') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('Dob'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Dob') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('Gender') ? 'has-error' : '' }}">
                <select id="Gender" required name="Gender" class="form-control" placeholder="{{ trans('adminlte::adminlte.Gender') }}"/>                                 
                                   <option value="" disabled selected>{{ trans('adminlte::adminlte.Gender') }}</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       </select>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('Gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Gender') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('JobTitle') ? 'has-error' : '' }}">
                    <input type="text" name="JobTitle" class="form-control" value="{{ old('JobTitle') }}"
                           placeholder="{{ trans('adminlte::adminlte.JobTitle') }}">
                    <span class="glyphicon glyphicon-book form-control-feedback"></span>
                    @if ($errors->has('JobTitle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('JobTitle') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('DateOfEmployment') ? 'has-error' : '' }}">
                    <input type="date" name="DateOfEmployment" class="form-control" value="{{ old('DateOfEmployment') }}"
                           placeholder="{{ trans('adminlte::adminlte.DateOfEmployment') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('DateOfEmployment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('DateOfEmployment') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('DateOfLastPromotion') ? 'has-error' : '' }}">
                    <input type="date" name="DateOfLastPromotion" class="form-control" value="{{ old('DateOfLastPromotion') }}"
                           placeholder="{{ trans('adminlte::adminlte.DateOfLastPromotion') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('DateOfLastPromotion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('DateOfLastPromotion') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('MaritalStatus') ? 'has-error' : '' }}">
                <select id="MaritalStatus" required name="MaritalStatus" class="form-control" placeholder="{{ trans('adminlte::adminlte.MaritalStatus') }}"/>                                 
                                   <option value="" disabled selected>{{ trans('adminlte::adminlte.MaritalStatus') }}</option>
                                       <option value="Married">Married</option>
                                       <option value="Single">Single</option>
                                       <option value="Divoced">Divoced</option>
                                       <option value="Separated">Separated</option>
                                       </select>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('MaritalStatus'))
                        <span class="help-block">
                            <strong>{{ $errors->first('MaritalStatus') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('EntitledLeaveDays') ? 'has-error' : '' }}">
                    <input type="text" name="EntitledLeaveDays" class="form-control" value="{{ old('EntitledLeaveDays') }}"
                           placeholder="{{ trans('adminlte::adminlte.EntitledLeaveDays') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('EntitledLeaveDays'))
                        <span class="help-block">
                            <strong>{{ $errors->first('EntitledLeaveDays') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('Nationality') ? 'has-error' : '' }}">
                    <input type="text" name="Nationality" class="form-control" value="{{ old('Nationality') }}"
                           placeholder="{{ trans('adminlte::adminlte.Nationality') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('Nationality'))
                        <span class="help-block">
                            <strong>{{ $errors->first('Nationality') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('NationalIDNum') ? 'has-error' : '' }}">
                    <input type="text" name="NationalIDNum" class="form-control" value="{{ old('NationalIDNum') }}"
                           placeholder="{{ trans('adminlte::adminlte.NationalIDNum') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('NationalIDNum'))
                        <span class="help-block">
                            <strong>{{ $errors->first('NationalIDNum') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('BirthCertificateNum') ? 'has-error' : '' }}">
                    <input type="text" name="BirthCertificateNum" class="form-control" value="{{ old('BirthCertificateNum') }}"
                           placeholder="{{ trans('adminlte::adminlte.BirthCertificateNum') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('BirthCertificateNum'))
                        <span class="help-block">
                            <strong>{{ $errors->first('BirthCertificateNum') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('CurrentStatus') ? 'has-error' : '' }}">
                <select id="CurrentStatus" required name="CurrentStatus" class="form-control" placeholder="{{ trans('adminlte::adminlte.CurrentStatus') }}"/>                                 
                                   <option value="" disabled selected>{{ trans('adminlte::adminlte.CurrentStatus') }}</option>
                                       <option value="Present">Present</option>
                                       <option value="Dismissed">Dismissed</option>
                                       </select>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('CurrentStatus'))
                        <span class="help-block">
                            <strong>{{ $errors->first('CurrentStatus') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('PayrollDepartment') ? 'has-error' : '' }}">
                <select id="PayrollDepartment" required name="PayrollDepartment" class="form-control" placeholder="{{ trans('adminlte::adminlte.PayrollDepartment') }}"/>                                 
                                   <option value="" disabled selected>{{ trans('adminlte::adminlte.PayrollDepartment') }}</option>
                                       <option value="HVTN">HVTN</option>
                                       <option value="2H">2H</option>
                                       </select>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('PayrollDepartment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('PayrollDepartment') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('AbsorbedInNIMR') ? 'has-error' : '' }}">
                <select id="AbsorbedInNIMR" required name="AbsorbedInNIMR" class="form-control" placeholder="{{ trans('adminlte::adminlte.AbsorbedInNIMR') }}"/>                                 
                                   <option value="" disabled selected>{{ trans('adminlte::adminlte.AbsorbedInNIMR') }}</option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       </select>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @if ($errors->has('AbsorbedInNIMR'))
                        <span class="help-block">
                            <strong>{{ $errors->first('AbsorbedInNIMR') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                    <input type="hidden" name="password" value="Changem3">

                    <input type="hidden" name="password_confirmation" value="Changem3">
                   
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
