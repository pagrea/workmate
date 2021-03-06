<?php

namespace App\Http\Controllers;
use App\Leaverequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()){
        $pendingSubstituteApproval = Leaverequest::where('RequestStatus','Pending Substitute Approval')
                                    ->where('Substitute',auth::user()->EmployeeID)
                                    ->count();
        $pendingHodApproval = Leaverequest::where('RequestStatus','Accepted by the substitute')
                                    ->where('DepartmentID',auth::user()->Department)
                                    ->count();
        $pendingHrApproval = Leaverequest::where('RequestStatus','Approved As Requested')
                                    ->count();

        $pendingCDApproval = \DB::table('users')->
                                        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                                        ->where('users.UserRole', 'Hod')
                                        ->where('leaverequests.RequestStatus', 'Accepted by the substitute')
                                        ->count();
        $leaveBalance = auth::user()->LeaveBalance;
        return view('home',compact('pendingSubstituteApproval','leaveBalance','pendingHodApproval','pendingHrApproval','pendingCDApproval'));
    }
}
}
