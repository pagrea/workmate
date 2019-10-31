@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">

<!-- Example row of columns -->
<h3 align="center">Edit Department </h3>

      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
     
      <form method="post" action="{{route('departments.update',[$departments->id])}}">
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="put">
                           <div class="form-group row">
                            <label for="DepartmentName" class="col-md-2 col-form-label text-md-right">Department Name<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            
                                <input id="DepartmentName" 
                                       type="text" 
                                       class="form-control @error('DepartmentName') is-invalid @enderror" 
                                       name="DepartmentName" 
                                       value="{{$departments->DepartmentName}}" 
                                       
                                       required autocomplete="DepartmentName" 
                                       autofocus >
                                       
                                @error('DepartmentName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DepartmentDescription" class="col-md-2 col-form-label text-md-right">Department Description<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                           
                                <input id="DepartmentDescription" 
                                       type="text" 
                                       class="form-control @error('DepartmentDescription') is-invalid @enderror" 
                                       name="DepartmentDescription" 
                                       value="{{$departments->DepartmentDescription}}" 
                                       required autocomplete="DepartmentDescription" 
                                       autofocus >
                                      
                                @error('DepartmentDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <a class="pull-left btn btn-primary" href="/departments">Back</a>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Save
                                </button>
                                </div>
                                </div>
</form>  


      </div> 

     </div> 
    


        @stop