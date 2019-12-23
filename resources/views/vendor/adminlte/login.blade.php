@extends('adminlte::master')


@if (session()->has('success'))
<div class="alert alert-dismissable alert-danger col-md-12 col-lg-12">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
          </button>
    <strong>{!! session()->get('success') !!} </strong>

     </div>
@endif
<<<<<<< HEAD
=======

>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
<<<<<<< HEAD
        
        <img src="{{URL::asset('/img/logonew.jpg')}}" alt="Assets Management system" height="100" width="350">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
        <h3 align="center"><b>WorkMate</b></h3>
        <p align="center"><b>Please Enter Your Username and Password to login</b></p>
        
=======
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
            <form action="/login" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}"
<<<<<<< HEAD
                           required placeholder="Enter your UserName">
                    <span class="glyphicon glyphicon-list form-control-feedback"></span>
=======
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
<<<<<<< HEAD
                          required  placeholder="{{ trans('adminlte::adminlte.password') }}">
=======
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
<<<<<<< HEAD
                                
=======
                                <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ trans('adminlte::adminlte.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
<<<<<<< HEAD
=======
            <div class="auth-links">
                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                   class="text-center"
                >{{ trans('adminlte::adminlte.i_forgot_my_password') }}</a>
                <br>
                @if (config('adminlte.register_url', 'register'))
                    <a href="{{ url(config('adminlte.register_url', 'register')) }}"
                       class="text-center"
                    >{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>
                @endif
            </div>
>>>>>>> 93f07bfdcf41c8023e8fbc7dc4850ba52cf46ee4
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
