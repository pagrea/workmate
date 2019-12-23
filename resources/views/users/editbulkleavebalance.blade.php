@extends('adminlte::page')
@section('content')

      @include('partials.errors')
      @include('partials.success')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">


<h3 align="center">Bulk Leave Balance Update </h3>
<!-- Example row of columns -->
<div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
            <form action="/updatebulkleavebalance" method="get">
                {!! csrf_field() !!}
                <div class="form-group row">
                            <label for="TypeofUpdate" class="col-md-2 col-form-label text-md-right">Type of Update<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                            <select id="TypeofUpdate" required name="TypeofUpdate" class="form-control @error('TypeofUpdate') is-invalid @enderror"/>
                            <option value=""></option>
                                       <option value="Add">Add</option>
                                       <option value="Deduct">Deduct</option>
                                       </select>
                                       @error('TypeofUpdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Days" class="col-md-2 col-form-label text-md-right">Days:<span class="required"><font color="red">*</font></span></label>
                            <div class="col-md-6">
                                <input id="Days" 
                                       type="text" 
                                       class="form-control @error('Days') is-invalid @enderror" 
                                       name="Days" 
                                       value="" 
                                       required autocomplete="Days" 
                                       autofocus >
                                @error('Days')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <a class="pull-left btn btn-primary" href="/staffleavebalance">Back</a>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                </div>
                                </div>
            </form>
           
           
    @stop
