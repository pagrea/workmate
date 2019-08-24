<?php

namespace App\Http\Controllers;

use App\User;
use App\Hrs_departments;
use App\Hrs_leaverequests;
use App\Hrs_leavebalances;

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

                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('hrs_leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->paginate(10);
 
        return view('leaverequests.index',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('hrs_leaverequests.EmployeeID', auth::user()->EmployeeID)
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
                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('hrs_leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->where('hrs_leaverequests.DepartmentID', auth::user()->PayrollDepartment)
                ->paginate(10);
 
        return view('leaverequests.departmentalleavehistory',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('hrs_leaverequests.DepartmentID', auth::user()->PayrollDepartment)
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

                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('hrs_leaverequests.EmployeeID','LIKE', '%' . $Search . '%')
                ->paginate(10);
 
        return view('leaverequests.employeeleavehistory',['leaverequests'=>$leaverequest]);
            }else{
                $leaverequest = \DB::table('hrs_leaverequests')->
                join('users' , 'hrs_leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->paginate(10);

            return view('leaverequests.employeeleavehistory',['leaverequests'=>$leaverequest]);
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
