@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
<h3 align="center">Register New Dependant of {{$User->FirstName}} {{$User->LastName}} </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="/storedependant" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                            <label for="user_id" class="col-md-2 col-form-label text-md-right">User ID<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="user_id" 
                                       type="text" 
                                       class="form-control @error('user_id') is-invalid @enderror" 
                                       readonly name="user_id" 
                                       value="{{$User->id}}" 
                                       required autocomplete="user_id" 
                                       autofocus >
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Full Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="name" 
                                       type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required autocomplete="name" 
                                       autofocus >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label text-md-right">Gender<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="gender" required name="gender" class="form-control @error('gender') is-invalid @enderror"/>
                            <option value="{{ old('gender') }}">{{ old('gender') }}</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                       </select>
                                       @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
      
                        <div class="form-group row">
                            <label for="relationship" class="col-md-2 col-form-label text-md-right">Relationship<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="relationship" 
                                       type="text" 
                                       class="form-control @error('relationship') is-invalid @enderror" 
                                       name="relationship" 
                                       value="{{ old('relationship') }}" 
                                       required autocomplete="relationship" 
                                       autofocus >
                                @error('relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
