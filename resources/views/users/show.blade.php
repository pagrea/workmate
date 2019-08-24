@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">



      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{$Approvalinfor->StudyName}}</h1>
        <p class="lead"><B><I>Summary:  </B></I> This study was submitted on {{$Approvalinfor->SubmissionDate}} 
        for  {{$Approvalinfor->ApplicationLevel}} Level at {{$Approvalinfor->ApprovalType}}  and the approval was done on {{$Approvalinfor->AprovalDate}}.
         The next extension date will be on {{$Approvalinfor->NextExtansionDate}} and 
         the progressive report due date is {{$Approvalinfor->NextSixMonthReportDate}}  </p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px">

      <a href="#" class="pull-right btn btn-default btn-sm">Add Project</a>
      
      </div> 

    </div>
    

   <div class="col-sm-3 col-md-3 col-lg-3  pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>-->

    <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="/approvalinfors" class="list-group-item">All Studies</a>
            <a href="/home" class="list-group-item">Home</a>
            <a href="/approvalinfors/{{$Approvalinfor->ID}}/edit" class="list-group-item">Edit</a>

              <a class="list-group-item"
              href="#"
                   onclick="
                   var result = confirm('Are you sure you wish to delete this study? Note that all the information for this study will be deleted!');
                           if (result){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                           }"
                >

              Delete</a>
              <form id="delete-form" action="{{route('approvalinfors.destroy',[$Approvalinfor->id])}}"
                    method="POST" style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                        </form>
              
          </div>


<!--
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div>
          -->
        </div>

@endsection