@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">

<!-- Example row of columns -->
<h3 align="center">Edit my Details </h3>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      <form method="GET" action="/updateprofile">
                           {{csrf_field()}}
                         
                           <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">First Name<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input id="first_name" 
                                       type="text" 
                                       class="form-control @error('first_name') is-invalid @enderror" 
                                       name="first_name" 
                                       value="{{$User->first_name}}" 
                                       required autocomplete="first_name" 
                                       autofocus >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-right">Last Name<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input id="last_name" 
                                       type="text" 
                                       class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" 
                                       value="{{$User->last_name}}" 
                                       required autocomplete="last_name" 
                                       autofocus >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="facility_name" class="col-md-2 col-form-label text-md-right">Facility Name<span class="required">*</span></label>
                            <div class="col-md-6">
                            <select id="facility_name" required name="facility_name" class="form-control @error('last_name') is-invalid @enderror"/>
                                       <option value="{{$User->facility_name}}">{{$User->facility_name}}</option>
                                       <option value="UWATA HC">UWATA HC</option>
                                       <option value="Makandana DC">Makandana DC</option>
                                       <option value="Mbeya RH">Mbeya RH</option>
                                       </select>
                                       @error('facility_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profession" class="col-md-2 col-form-label text-md-right">Profession/JobTitle<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input id="profession" 
                                       type="text" 
                                       class="form-control @error('profession') is-invalid @enderror" 
                                       name="profession" 
                                       value="{{$User->profession}}" 
                                       required autocomplete="profession" 
                                       autofocus >
                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$User->email}}" required autocomplete="email">

                                @error('email')
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
</form>  
      </div> 

     </div> 
    
        @stop