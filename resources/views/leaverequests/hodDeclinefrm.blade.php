@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">

<!-- Example row of columns -->
@foreach($requestname as $requestnames)
<h3 align="center">Reason for Decline Leave Request of  {{$requestnames->FirstName}} {{$requestnames->LastName}}</h3>
@endforeach
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
     
      <form method="post" action="/hodDecline/{{$leaverequest->id}}">
                           {{csrf_field()}}
                           
                           <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right"> Request <span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            
                                <input id="RequestStatus" 
                                       type="text" 
                                       class="form-control @error('RequestStatus') is-invalid @enderror" 
                                       readonly  name="RequestStatus" 
                                       value="Declined by HoD" 
                                       
                                       required autocomplete="RequestStatus" 
                                       autofocus >
                                       
                                @error('RequestStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="decline_reason" class="col-md-2 col-form-label text-md-right">Reason For Decline<span class="required"><font color="red">*</font></span></label>
                                <div class="col-md-9">
                                <textarea placeholder="Fill the reason for Decline"
                                           style="resize:Vertical"
                                           id="decline_reason"
                                           required name="decline_reason"
                                           spellcheck="true"
                                           rows="5"
                                           class="form-control autosize-target text-left"
                                           ></textarea>

                                           @error('decline_reason')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  </div>  

                        <a class="pull-left btn btn-primary" href="/hodleaveapproval">Back</a>
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