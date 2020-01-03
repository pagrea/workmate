<div class="col-md-9 col-lg-12 col-sm-12 pull-left" style="background: white;">
      <!-- Jumbotron -->
      <div class="pull-center">
       <h3 align ="center">NIMR-Mbeya Medical Research center</h3>
       <p align ="center">Information for {{$User->FirstName}} {{$User->LastName}}</p>
           </div>

   <table border="1" cellspacing="0" class="table table-bordered" >
  <tbody>
  <tr><td>ID: <b>{{$User->id}}<b> </td>
  <td>EmployeeID: <b>{{$User->EmployeeID}}</b></td>
  <td>First Name: <b>{{$User->FirstName}}</b></td>
  <td>Last Name: <b>{{$User->LastName}}</b></td>
  </tr>
  <tr><td>Date of birth: <b>{{$User->Dob}}</b></td>
  <td>Gender: <b>{{$User->Gender}}</b></td>
  <td>Job Title: <b>{{$User->JobTitle}}</b></td>
  <td>Highest education level: <b>{{$User->highest_education_level}}</b></td>
  </tr>
  <tr><td>Date Of Employment: <b>{{$User->DateOfEmployment}}</b></td>
  <td>Date Of Last Promotion: <b>{{$User->DateOfLastPromotion}}</b></td>
  <td>Marital Status: <b>{{$User->MaritalStatus}}</b></td>
  <td>Leave Balance: <b>{{$User->LeaveBalance}}</b></td>
  </tr>
  <tr><td>Nationality: <b>{{$User->Nationality}}</b></td>
  <td>National ID Number: <b>{{$User->NationalIDNum}}</b></td>
  <td>Birth Certificate Number: <b>{{$User->BirthCertificateNum}}</b></td>
  <td>Current Status: <b>{{$User->CurrentStatus}}</b></td>
  </tr>
  <tr><td>Department: <b>{{$User->Department}}</b></td>
  <td>Absorbed In NIMR: <b>{{$User->AbsorbedInNIMR}}</b></td>
  <td>email: <b>{{$User->email}}</td>
  <td>Other Email: <b>{{$User->OtherEmail}}</b></td>
  </tr>
  <tr><td>Phone Number: <b>{{$User->PhoneNumber}}</b></td>
  <td>Staff Current Address: <b>{{$User->StaffCurrentAddress}}</b></td>
  <td>Emegency Contant Person: <b>{{$User->EmegencyContantPerson}}</b></td>
  <td>Emegency Contact Number: <b>{{$User->EmegencyContactNumber}}</b></td>
  </tr>
  <tr><td>Staff Home Address: <b>{{$User->StaffHomeAddress}}</b></td>
  <td>Updated at: <b>{{$User->updated_at}}</b></td>
  <td></td>
  <td></td>
  </tr>
  </table>

  <div class="pull-left">
       <h3>Dependants</h3>
           </div>

           <table border="1" cellspacing="0"  class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Gender</th>
    <th>Relationship</th>
    
  </tr>
  </thead>
  <tbody>
    @foreach($dependants as $dependant)
      <tr>
        <td>{{$dependant->id}}</td>
        <td>{{$dependant->name}}</td>
        <td>{{$dependant->gender}}</td>
        <td>{{$dependant->relationship}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
