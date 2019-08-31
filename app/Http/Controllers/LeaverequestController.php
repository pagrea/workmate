<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use App\Leaverequest;

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
            if ($Search !=""){

                $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->paginate(10);
 
        return view('leaverequests.index',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->paginate(10);

            return view('leaverequests.index',['leaverequests'=>$leaverequest]);
        }
    }
    }



    public function departmentalleavehistory(Request $request)
    {
        //
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
                ->paginate(10);
 
        return view('leaverequests.departmentalleavehistory',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.DepartmentID', auth::user()->Department)
                ->paginate(10);
            return view('leaverequests.departmentalleavehistory',['leaverequests'=>$leaverequest]);
        }
    }
    }


    public function employeeleavehistory(Request $request)
    {
        //
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){

                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->paginate(10);
 
        return view('leaverequests.employeeleavehistory',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->paginate(10);

            return view('leaverequests.employeeleavehistory',['leaverequests'=>$leaverequest]);
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
                $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.Substitute', auth::user()->EmployeeID)
                ->where('Leaverequests.RequestStatus', 'Pending Substitute Approval')
                ->paginate(10);
 
        return view('leaverequests.substituteleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.Substitute', auth::user()->EmployeeID)
                ->where('Leaverequests.RequestStatus', 'Pending Substitute Approval')
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
                $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('leaverequests.DepartmentID', auth::user()->PayrollDepartment)
                ->paginate(10);
 
        return view('leaverequests.hodleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.DepartmentID', auth::user()->Department)
                ->where('Leaverequests.RequestStatus', 'Accepted by the substitute')
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
                $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.RequestStatus', 'Approved As Requested')
                ->paginate(10);
 
        return view('leaverequests.hrleaveapproval',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('Leaverequests')->
                join('users' , 'Leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('Leaverequests.RequestStatus', 'Approved As Requested')
                ->paginate(10);
            return view('leaverequests.hrleaveapproval')->with('leaverequests', $leaverequest);
    
        }
    }
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $deptstaff = User::where('Department',auth::user()->Department)->get();
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
                'DaysRequested' => 'required|integer|lte:LeaveBalance|gte:'.$days,
                'EndDate' => 'required|date|after:StartDate',
                'TypeOfLeave' => 'required|string|max:50',
                'Substitute' => 'required|string|max:50',
                ]);

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
                return redirect()->route('leaverequests.index')->with('success','Your Request has been submitted successful, It is waiting for a substitute to approve. Please Do not proceed with a leave until you obtain HR approval.');;

        }else{
            return back()->withinput()->with('errors','Error Occured, Probably this user exist');
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
