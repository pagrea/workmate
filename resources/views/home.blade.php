@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">
        @include('partials.userStatusBoxes')
   
    @hasanyrole('Hod')
        @include('partials.hodStatusBoxes')
    @endhasanyrole 

    @hasanyrole('HR')
        @include('partials.hrStatusBoxes')
    @endhasanyrole 

    @hasanyrole('CD')
        @include('partials.cdStatusBoxes')
    @endhasanyrole 
</div>
@stop