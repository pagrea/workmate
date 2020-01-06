<?php

namespace App\Http\Controllers;
use App\Exports\DepartmentalleavehistoryExports;
use App\Exports\AllstaffsleavehistoryExports;
use App\Exports\LeavehistoryExports;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Mail;
use App\Department;
use App\Leaverequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LeaveApprovalRequestReceived;
use App\Notifications\DepartmentalLeaveApprovalRequestReceived;
use App\Notifications\LeaveApprovalRequestDeclinedBySubstitute;
use App\Notifications\HRLeaveApprovalRequestReceived;
use App\Notifications\LeaveApprovalRequestDeniedByHOD;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaverequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (Auth::check()){

            
           
            $Search = $request->input('Search');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if ($Search !="" && $startDate =="" ){
                \Session::put('search1', $Search);
                \Session::put('startDate1', '');
                \Session::put('endDate1', '');

                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->where('users.FirstName','LIKE', '%' . $Search . '%')

                ->orWhere('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->where('users.LastName','LIKE', '%' . $Search . '%')

                ->orderBy('leaverequests.id', 'DESC')
                ->paginate(10);
        return view('leaverequests.index',['leaverequests'=>$leaverequest]);
            }

            elseif ($Search =="" && $startDate !="" ){
                \Session::put('startDate1', $startDate);
                \Session::put('endDate1', $endDate);
                \Session::put('search1', '');
                
                
            $validatedData = $request->validate([
                'start_date' => 'required|date|before:end_date',
                'end_date' => 'required|date|after:start_date',
                ]);


            $leaverequest = \DB::table('users')->
            join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
            ->where('leaverequests.StartDate','>=', $startDate)
            ->where('leaverequests.StartDate','<=', $endDate)
            ->orderBy('leaverequests.id', 'DESC')
            ->paginate(10);
            return view('leaverequests.index',['leaverequests'=>$leaverequest]);
        }
            elseif ($Search !="" && $startDate !="" ){
                \Session::put('startDate1', $startDate);
                \Session::put('endDate1', $endDate);
                \Session::put('search1', $Search);

                $validatedData = $request->validate([
                    'start_date' => 'required|date|before:end_date',
                    'end_date' => 'required|date|after:start_date',
                    ]);

                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->where('leaverequests.StartDate','>=', $startDate)
                ->where('leaverequests.StartDate','<=', $endDate)
                ->where('leaverequests.TypeOfLeave','LIKE', '%' . $Search . '%')
                ->orderBy('leaverequests.id', 'DESC')
                ->paginate(10);
                return view('leaverequests.index',['leaverequests'=>$leaverequest]);
            
            }else{
                \Session::put('startDate1', '');
                \Session::put('endDate1', '');
                \Session::put('search1', '');
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->orderBy('leaverequests.id', 'DESC')
                ->paginate(10);

            return view('leaverequests.index',['leaverequests'=>$leaverequest]);
        }
    }
    }

// 

    public function departmentalleavehistory(Request $request)
    {
        // 
        if (Auth::check()){

           
            $Search = $request->input('Search');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

           
            
            $staffNames = \DB::table('users')->
            join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->where('leaverequests.DepartmentID', auth::user()->Department)
            ->distinct()
            ->select('leaverequests.EmployeeID','users.FirstName','users.LastName')
            ->get();

            if ($Search !="" && $startDate =="" ){
                \Session::put('startDate1', '');
                \Session::put('endDate1', '');
                \Session::put('search1', $Search);
                $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
                ->where('users.Department','!=', 'Not Available')
                ->orderBy('leaverequests.id', 'DESC')
                ->paginate(50);
 
        return view('leaverequests.departmentalleavehistory',compact('leaverequests','staffNames'));
            }
            elseif ($Search =="" && $startDate !="" ){
                \Session::put('startDate1', $startDate);
                \Session::put('endDate1', $endDate);
                \Session::put('search1', '');
                $validatedData = $request->validate([
                    'start_date' => 'required|date|before:end_date',
                    'end_date' => 'required|date|after:start_date',
                    ]);
    
                $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
                ->where('leaverequests.StartDate','>=', $startDate)
                ->where('leaverequests.StartDate','<=', $endDate)
                ->where('users.Department','!=', 'Not Available')
                ->orderBy('leaverequests.EmployeeID', 'DESC')
                ->paginate(50);
                return view('leaverequests.departmentalleavehistory',compact('leaverequests','staffNames'));

    }
     elseif ($Search !="" && $startDate !="" ){
        \Session::put('startDate1', $startDate);
        \Session::put('endDate1', $endDate);
        \Session::put('search1', $Search);
        $validatedData = $request->validate([
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            ]);

        $leaverequests = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('leaverequests.DepartmentID', auth::user()->Department)
        ->where('leaverequests.StartDate','>=', $startDate)
        ->where('leaverequests.StartDate','<=', $endDate)
        ->where('users.EmployeeID','LIKE', '%' . $Search . '%')
        ->where('users.Department','!=', 'Not Available')
        ->orderBy('leaverequests.id', 'DESC')
        ->paginate(50);
        return view('leaverequests.departmentalleavehistory',compact('leaverequests','staffNames'));
            }else{

                \Session::put('startDate1', '');
                \Session::put('endDate1', '');
                \Session::put('search1', '');

                $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
                ->where('users.Department','!=', 'Not Available')
                ->orderBy('FirstName')
                ->paginate(10);
                return view('leaverequests.departmentalleavehistory',compact('leaverequests','staffNames'));
        }
    }
    }


    public function employeeleavehistory(Request $request)
    {
        //
        if (Auth::check()){

               
          
            $Search = $request->input('Search');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $staffNames = \DB::table('users')->
            join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->distinct()
            ->select('leaverequests.EmployeeID','users.FirstName','users.LastName')
            ->get();

            if ($Search !="" && $startDate =="" ){
                \Session::put('startDate1', '');
                \Session::put('endDate1', '');
                \Session::put('search1', $Search);
                $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('users.Department','!=', 'Not Available')
                ->orderBy('leaverequests.id', 'DESC')
                ->paginate(50);
 
        return view('leaverequests.employeeleavehistory',compact('leaverequests','staffNames'));

    } elseif ($Search =="" && $startDate !="" ){
        \Session::put('startDate1', $startDate);
        \Session::put('endDate1', $endDate);
        \Session::put('search1', '');
        $validatedData = $request->validate([
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            ]);

        $leaverequests = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('leaverequests.StartDate','>=', $startDate)
        ->where('leaverequests.StartDate','<=', $endDate)
        ->where('users.Department','!=', 'Not Available')
        ->orderBy('leaverequests.EmployeeID', 'DESC')
        ->paginate(10);
        return view('leaverequests.employeeleavehistory',compact('leaverequests','staffNames'));

    }
    elseif ($Search !="" && $startDate !="" ){
        \Session::put('startDate1', $startDate);
        \Session::put('endDate1', $endDate);
        \Session::put('search1', $Search);

        $validatedData = $request->validate([
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            ]);

        $leaverequests = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('leaverequests.StartDate','>=', $startDate)
        ->where('leaverequests.StartDate','<=', $endDate)
        ->where('users.EmployeeID','LIKE', '%' . $Search . '%')
        ->where('users.Department','!=', 'Not Available')
        ->orderBy('leaverequests.id', 'DESC')
        ->paginate(10);
        return view('leaverequests.employeeleavehistory',compact('leaverequests','staffNames'));

    }else{
        \Session::put('startDate1', '');
        \Session::put('endDate1', '');
        \Session::put('search1', '');

        $leaverequests = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('users.Department','!=', 'Not Available')
        ->orderBy('FirstName')
        ->paginate(10);
        return view('leaverequests.employeeleavehistory',compact('leaverequests','staffNames'));
        }
    }
    }

/**********************************Substitute Approvals******************************************** */
    public function substituteleaveapproval(Request $request)
    {
        //
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.Substitute', auth::user()->EmployeeID)
                ->where('leaverequests.RequestStatus', 'Pending Substitute Approval')
                ->paginate(10);
 
        return view('leaverequests.substituteleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.Substitute', auth::user()->EmployeeID)
                ->where('leaverequests.RequestStatus', 'Pending Substitute Approval')
                ->paginate(10);

            return view('leaverequests.substituteleaveapproval',['leaverequests'=>$leaverequest]);
        }
    }
    }

    /**********************************HOD Leave Approvals******************************************** */
    public function hodleaveapproval(Request $request)
    {
        //
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('leaverequests.DepartmentID', auth::user()->PayrollDepartment)
                ->paginate(10);
 
        return view('leaverequests.hodleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
                ->where('leaverequests.RequestStatus', 'Accepted by the substitute')
                ->paginate(10);

            return view('leaverequests.hodleaveapproval',['leaverequests'=>$leaverequest]);
        }
    }
    }


    /**********************************HR Leave Approvals******************************************** */
    public function hrleaveapproval(Request $request)
    {
        //
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.RequestStatus', 'Approved As Requested')
                ->paginate(10);
 
        return view('leaverequests.hrleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.RequestStatus', 'Approved As Requested')
                ->paginate(10);
            return view('leaverequests.hrleaveapproval')->with('leaverequests', $leaverequest);
    
        }
    }
    }

    public function hodDeclinefrm($id)
    {
        //
        $leaverequest = Leaverequest::find($id);
        $requestname=User::where('EmployeeID',$leaverequest->EmployeeID)->get();
        return view('leaverequests.hodDeclinefrm')->with('leaverequest', $leaverequest)->with('requestname', $requestname);
    }

    public function hrDeclinefrm($id)
    {
        //
        $leaverequest = Leaverequest::find($id);
        $requestname=User::where('EmployeeID',$leaverequest->EmployeeID)->get();
        return view('leaverequests.hrDeclinefrm')->with('leaverequest', $leaverequest)->with('requestname', $requestname);
    }


    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $deptstaff = User::where('Department',auth::user()->Department)
        ->where('EmployeeID','!=',auth::user()->EmployeeID)
        ->where('Department','!=', 'Not Available')
        ->get();
        $user = User::find(auth::user()->id);
        return view('leaverequests.create')->with('deptstaff', $deptstaff)->with('User', $user);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if (Auth::check()){

              $StartDate = strtotime($request->input('StartDate')); // or your date as well
              $EndDate = strtotime($request->input('EndDate'));
              $datediff = $EndDate - $StartDate;
              $days= round($datediff / (60 * 60 * 24));

            $validatedData = $request->validate([
                'ContactTelephone' => 'required|regex:/(0)[0-9]{9}/',
                'StartDate' => 'required|date|before:EndDate',
                'DaysRequested' => 'required|integer|lte:LeaveBalance|gte:1|gte:'.$days,
                'EndDate' => 'required|date|after:StartDate',
                'TypeOfLeave' => 'required|string|max:50',
                'Substitute' => 'required|string|max:50',
                ]);


                $pendingRequest = Leaverequest::where('EmployeeID',auth::user()->EmployeeID)
                ->Where('EndDate','>', $request->input('StartDate'))
                ->where('RequestStatus','!=','Declined by the substitute')
                ->where('RequestStatus','!=','Declined by HoD')
                ->where('RequestStatus','!=','Declined by HR')
                ->count();

                if($pendingRequest > 0){
                    return back()->withinput()->with('errors2','Error Occured, You have a pending Leave Request, Please check your leave history, or Contact IT team for help');
                }else{

            $ID=$request->input('EmployeeID');
           $apply=Leaverequest::create([
                     'EmployeeID'=>$request->input('EmployeeID'),
                     'DepartmentID'=>$request->input('DepartmentID'),
                     'RequestDate'=>date("Y-m-d"),
                     'StartDate'=>$request->input('StartDate'),
                     'DaysRequested'=>$request->input('DaysRequested'),
                     'EndDate'=>$request->input('EndDate'),
                     'TypeOfLeave'=>$request->input('TypeOfLeave'),
                     'Substitute'=>$request->input('Substitute'),
                     'ContactTelephone'=>$request->input('ContactTelephone'),
                     'RequestStatus'=>'Pending Substitute Approval',
                     'DaysApproved'=>'0',
                     'UpdatedBy'=>auth::user()->email,
                     'user_id'=>auth::user()->id
                     ]);

                     if($apply){
                         $substitute = User::where('EmployeeID', 'LIKE', $request->input('Substitute'))->first();
                         $substituteName = $substitute->FirstName . ' ' . $substitute->LastName;
                         $substituteEmail = $substitute->email;
                         $requesterName = auth::user()->FirstName . ' ' . auth::user()->LastName;

                        //Send Email Notification to substitute
                        Notification::route('mail', $substituteEmail)
                            ->notify(new LeaveApprovalRequestReceived($requesterName, $substituteName));

                        return redirect()->route('leaverequests.index')->with('success','Your Request has been successfully submitted, It now awaits Substitute Approval. Please Do not leave until you receive HR approval.');;

                        }else{
                            return back()->withinput()->with('errors','Error Occured, Probably this Record exist');
                        }   
                    }
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Leaverequest $leaverequest)
    {
        $leaverequests  = Leaverequest::find($leaverequest->id);
        $requestname=User::where('EmployeeID',$leaverequests->EmployeeID)->get();
        $requestsubstitute=User::where('EmployeeID',$leaverequests->Substitute)->get();
        return view('leaverequests.show',compact('leaverequests','requestname','requestsubstitute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /*******************************Substitute Approval Accept************************************ */
    public function substituteAccept($id)
    {
        //
        $Leaverequests=Leaverequest::where('id',$id)->update([
                    'RequestStatus'=>'Accepted by the substitute',
                    'UpdatedBy'=>auth::user()->email
                 ]);

if ($Leaverequests){
    $updatedLeaveRequest = Leaverequest::findOrFail($id);
    $applicantEmpId = $updatedLeaveRequest->EmployeeID;
    $applicantDept = User::where('EmployeeID', 'LIKE', $applicantEmpId)->pluck('Department');
    $hodEmails = User::role('Hod')->where('Department', 'LIKE', $applicantDept)->pluck('email');

    //Send Email to HODs
    Notification::route('mail', $hodEmails)
      ->notify(new DepartmentalLeaveApprovalRequestReceived());

return redirect()->route('leaverequests.substituteleaveapproval')->with('success','You have accepted to be a subsitute and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating');
}

/*******************************Substitute Approval Decline************************************ */

public function substituteDecline($id)
    {
        //
        $Leaverequests=Leaverequest::where('id',$id)->update([
                    'RequestStatus'=>'Declined by the substitute',
                    'UpdatedBy'=>auth::user()->email
                 ]);

if ($Leaverequests){
    $updatedLeaveRequest = Leaverequest::findOrFail($id);
    $applicant = User::where('EmployeeID', 'LIKE', $updatedLeaveRequest->EmployeeID)->first();
    $applicantEmail = $applicant->email;
    $applicantName = $applicant->FirstName . ' ' . $applicant->LastName;
    $substitute = User::where('EmployeeID', 'LIKE', $updatedLeaveRequest->Substitute)->first();
    $substituteName = $substitute->FirstName . ' ' . $substitute->LastName;

    //Send Email notification to Applicant for Substitute Decline
    Notification::route('mail', $applicantEmail)
     ->notify(new LeaveApprovalRequestDeclinedBySubstitute($substituteName, $applicantName));
     
return redirect()->route('leaverequests.substituteleaveapproval')->with('success','You have Declined to be a subsitute and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating');
}

 /*******************************HOD Approval Accept************************************ */
 public function hodAccept($id)
 {
     //
     $Leaverequests=Leaverequest::where('id',$id)->update([
                 'RequestStatus'=>'Approved As Requested',
                 'UpdatedBy'=>auth::user()->email
              ]);

if ($Leaverequests){
    $hrEmails = User::role('HR')->pluck('email');

    //Send Email to HR
    Notification::route('mail', $hrEmails)
      ->notify(new HRLeaveApprovalRequestReceived());
      
return redirect()->route('leaverequests.hodleaveapproval')->with('success','You have approved the leave as HOD and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating');
}

/*******************************HOD Approval Decline************************************ */

public function hodDecline(Request $request, $id)
 {
     //
     $validatedData = $request->validate([
        'decline_reason' => 'required|string|max:500',
        ]);

     $Leaverequests=Leaverequest::where('id',$id)->update([
                 'decline_reason'=>$request->input('decline_reason'),
                 'RequestStatus'=>'Declined by HoD',
                 'UpdatedBy'=>auth::user()->email
              ]);

if ($Leaverequests){
    $updatedLeaveRequest = Leaverequest::findOrFail($id);
    $applicant = User::where('EmployeeID', 'LIKE', $updatedLeaveRequest->EmployeeID)->first();
    $applicantEmail = $applicant->email;
    $applicantName = $applicant->FirstName . ' ' . $applicant->LastName;

    //Send Email to the applicant to alert HOD Decline
    Notification::route('mail', $applicantEmail)
     ->notify(new LeaveApprovalRequestDeniedByHOD($applicantName));

return redirect()->route('leaverequests.hodleaveapproval')->with('success','You have Declined the leave as HOD and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating');
}

/*******************************HR Approval Accept************************************ */
public function hrAccept(Request $request)
{
    //

    $DaysRequested =$request->input('DaysRequested');
    $TypeOfLeave =$request->input('TypeOfLeave');
    $id =$request->input('id');
    $EmployeeID =$request->input('EmployeeID');
    $LeaveBalance =$request->input('LeaveBalance');

    if (($TypeOfLeave=="Annual" || $TypeOfLeave=="Emergence" || $TypeOfLeave=="Other")){
        $deductbalance= $LeaveBalance-$DaysRequested;
       User::where('EmployeeID',$EmployeeID)->update([
            'LeaveBalance'=>$deductbalance,
            'UpdatedBy'=>auth::user()->email
         ]);
    }
    $Leaverequests=Leaverequest::where('id',$id)->update([
        'RequestStatus'=>'Approved by HR',
        'DaysApproved'=>$DaysRequested,
        'UpdatedBy'=>auth::user()->email
     ]);

if ($Leaverequests){
return redirect()->route('leaverequests.hrleaveapproval')->with('success','You have approved the leave as HR and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating');

}

/*******************************HR Approval Decline************************************ */

public function hrDecline(Request $request, $id)
{
    //
    $validatedData = $request->validate([
        'decline_reason' => 'required|string|max:500',
        ]);

    $Leaverequests=Leaverequest::where('id',$id)->update([
                'decline_reason'=>$request->input('decline_reason'),
                'RequestStatus'=>'Declined by HR',
                'UpdatedBy'=>auth::user()->email
             ]);

if ($Leaverequests){

return redirect()->route('leaverequests.hrleaveapproval')->with('success','You have Declined the leave as HR and Record Saved successiful!');
}
return back()->withinput()->with('errors','Error Updating, Please Contact IT to help on this');

}

/****************************************************send email********************* */
public function sendemail()
{
    {
        $data['title'] = "This is Test Mail Tuts Make";
 
        Mail::send('emails.email', $data, function($message) {
            $message->to('pagrea@nimr-mmrc.org', 'Peter Agrea')
 
                    ->subject('Test Mail');
        });
 
        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }

}

    /*******************************Export to Excel ************************************ */
    public function personalleavehistoryexport() 
    {
        return Excel::download(new LeavehistoryExports, 'personalleavehistory.xlsx');
    }
    public function Exportdepartmentalleavehistory() 
    {
        return Excel::download(new DepartmentalleavehistoryExports, 'DepartmentalleavehistoryExports.xlsx');
    }

    public function ExportAllstaffsleavehistory() 
    {
        return Excel::download(new AllstaffsleavehistoryExports, 'AllstaffsleavehistoryExports.xlsx');
    }


    //********************************* Export to PDF********************************
    public function exportpdf($id)
{
  // Fetch all customers from database
  $leaverequests  = Leaverequest::find($id);
  $requestname=User::where('EmployeeID',$leaverequests->EmployeeID)->get();
  $requestsubstitute=User::where('EmployeeID',$leaverequests->Substitute)->get();
  // Send data to the view using loadView function of PDF facade
    $pdf = \PDF::loadView('leaverequests.expTopdf',compact('leaverequests','requestname','requestsubstitute'));

  // Finally, you can download the file using download function
    return $pdf->download('PDFExports.pdf');
}
//*********************************End Export to PDF ********************************
    

    
    
}
