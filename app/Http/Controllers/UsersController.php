<?php
namespace App\Http\Controllers;
use App\User;
use App\Hrs_departments;
use App\Hrs_3staffaddress;
use App\Hrs_leavebalances;
use App\Http\Controllers\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $users = User::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('EmployeeID','LIKE', '%' . $Search . '%')
                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->orWhere('Dob','LIKE', '%' . $Search . '%')
                ->orWhere('Gender','LIKE', '%' . $Search . '%')
                ->orWhere('JobTitle','LIKE', '%' . $Search . '%')
                ->orWhere('MaritalStatus','LIKE', '%' . $Search . '%')
                ->orWhere('Nationality','LIKE', '%' . $Search . '%')
                ->orWhere('NationalIDNum','LIKE', '%' . $Search . '%')
                ->orWhere('UserRole','LIKE', '%' . $Search . '%')
                ->orWhere('email','LIKE', '%' . $Search . '%')
                ->paginate(10);
 
        return view('users.index',['users'=>$users]);
            }else{
            $users = User::paginate(10);
            
            return view('users.index',['users'=>$users]);
        }
    }
    }


    public function staffaddresses(Request $request)
    {
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                
                //$users = Hrs_3staffaddress::where('EmployeeID','LIKE', '%' . $Search . '%')
                $users = \DB::table('hrs_3staffaddresses')
                ->join('users' , 'hrs_3staffaddresses.EmployeeID' , '=','users.EmployeeID')
                ->orWhere('StaffCurrentAddress','LIKE', '%' . $Search . '%')
                ->orWhere('StaffHomeAddress','LIKE', '%' . $Search . '%')
                ->orWhere('HomeRegion','LIKE', '%' . $Search . '%')
                ->orWhere('HomeDistrict','LIKE', '%' . $Search . '%')
                ->orWhere('StaffTelephone1','LIKE', '%' . $Search . '%')
                ->orWhere('StaffEmail1','LIKE', '%' . $Search . '%')
                ->orWhere('StaffEmail2','LIKE', '%' . $Search . '%')
                ->orWhere('EmegencyContantPerson','LIKE', '%' . $Search . '%')
                ->orWhere('EmegencyContactNumber','LIKE', '%' . $Search . '%')
                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->paginate(10);
                
        return view('users.staffaddresses',['users'=>$users]);
            }else{

                $users = \DB::table('hrs_3staffaddresses')->
               join('users' , 'hrs_3staffaddresses.EmployeeID' , '=','users.EmployeeID')->paginate(10);
               //$users = Hrs_3staffaddress::where('EmployeeID','!=',0)->get();

            return view('users.staffaddresses',['users'=>$users]);
        }
    }
    }



    public function staffleavebalance(Request $request)
    {
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
               // $users = Hrs_leavebalances::where('EmployeeID','LIKE', '%' . $Search . '%')
               $users = \DB::table('hrs_leavebalances')->
               join('users' , 'hrs_leavebalances.EmployeeID' , '=','users.EmployeeID')
                ->orWhere('Balance','LIKE', '%' . $Search . '%')
                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->paginate(10);
        return view('users.staffleavebalance',['users'=>$users]);
            }else{


                $users = \DB::table('hrs_leavebalances')->
               join('users' , 'hrs_leavebalances.EmployeeID' , '=','users.EmployeeID')->paginate(10);
            //$users = Hrs_leavebalances::where('EmployeeID','!=',0)->get();
            return view('users.staffleavebalance',['users'=>$users]);
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
       $departments = Hrs_departments::where('id','!=',0)->get();
        return view('users.create')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         if (Auth::check()){
            $ID=$request->input('EmployeeID');
           $addusers=User::create([
                     'EmployeeID'=>$request->input('EmployeeID'),
                     'FirstName'=>$request->input('FirstName'),
                     'LastName'=>$request->input('LastName'),
                     'Dob'=>$request->input('Dob'),
                     'Gender'=>$request->input('Gender'),
                     'JobTitle'=>$request->input('JobTitle'),
                     'DateOfEmployment'=>$request->input('DateOfEmployment'),
                     'DateOfLastPromotion'=>$request->input('DateOfLastPromotion'),
                     'MaritalStatus'=>$request->input('MaritalStatus'),
                     'EntitledLeaveDays'=>$request->input('EntitledLeaveDays'),
                     'Nationality'=>$request->input('Nationality'),
                     'NationalIDNum'=>$request->input('NationalIDNum'),
                     'BirthCertificateNum'=>$request->input('BirthCertificateNum'),
                     'CurrentStatus'=>$request->input('CurrentStatus'),
                     'PayrollDepartment'=>$request->input('PayrollDepartment'),
                     'AbsorbedInNIMR'=>$request->input('AbsorbedInNIMR'),
                     'email'=>$request->input('email'),
                     'password'=>Hash::make($request->input('password')),
                     'UpdatedBy'=>auth::user()->email
                     ]);

                     if($addusers){
                return redirect()->route('user.createstaffaddresses')->with('success','Information have been saved Successfully, Now fill the staff address here.');;

        }else{
            return back()->withinput()->with('errors','Error Occured, Probably this user exist');
        }
    }
}

/***********************************************Update staff************************* */
    public function storestaffaddresses(Request $request)
    {
        if (Auth::check()){
        $update=Hrs_3staffaddress::create([
                                'EmployeeID'=>$request->input('EmployeeID'),
                                'StaffCurrentAddress'=>$request->input('StaffCurrentAddress'),
                                'StaffHomeAddress'=>$request->input('StaffHomeAddress'),
                                'HomeRegion'=>$request->input('HomeRegion'),
                                'StaffTelephone1'=>$request->input('StaffTelephone1'),
                                'StaffTelephone2'=>$request->input('StaffTelephone2'),
                                'StaffTelephone3'=>$request->input('StaffTelephone3'),
                                'StaffEmail1'=>$request->input('StaffEmail1'),
                                'StaffEmail2'=>$request->input('StaffEmail2'),
                                'EmegencyContantPerson'=>$request->input('EmegencyContantPerson'),
                                'EmegencyContactNumber'=>$request->input('EmegencyContactNumber'),
                                'UpdatedBy'=>auth::user()->email
                             ]);
if ($update){
return redirect()->route('user.createleavebalance')->with('success','Information have been saved Successfully, Now fill the staff leave Balance here.');;
 // return back()->withinput()->with('success','Information have been saved Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating information');
    }
}

/***********************************************store leave balance************************* */
public function storeleavebalance(Request $request)
{
    if (Auth::check()){
    $update=Hrs_leavebalances::create([
                            'EmployeeID'=>$request->input('EmployeeID'),
                            'Balance'=>$request->input('Balance'),
                            'UpdatedBy'=>auth::user()->email
                         ]);
if ($update){
return redirect()->route('user.index')->with('success','Information have been saved Successfully, Now you have completed the registration of New Staff.');;
//return back()->withinput()->with('success','Information have been saved Successfully, Now you have completed the registration.');
}

    //redirect
   // return back()->withinput();
   return back()->withinput()->with('errors','Error Updating information');
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
    public function edit(User $user)
    {
        //
        $departments = Hrs_departments::where('id','!=',0)->get();
        $User  = User::find($user->id);
        return view('users.edit')->with('departments', $departments)->with('User', $User);

    }

    public function editprofile(User $user)
    {
        //
        $User  = User::find(auth::user()->id);
        return view('users.editprofile',['User'=>$User]);
    }

    public function editpassword(User $user)
    {
        return view('users.editpassword');
    }

    public function createstaffaddresses()
    {
        $user = User::where('id','!=',0)->get();
        return view('users.createstaffaddresses')->with('user', $user);
    }


    public function editstaffaddresses($EmployeeID)
    {
        $user = User::where('id','!=',0)->get();
        $useraddr = Hrs_3staffaddress::where('EmployeeID',$EmployeeID)->get();
        return view('users.editstaffaddresses')->with('user', $user)->with('useraddr', $useraddr);
    }
    

    public function createleavebalance()
    {
        $user = User::where('id','!=',0)->get();
        return view('users.createleavebalance')->with('user', $user);
    }
    


    public function editleavebalance($EmployeeID)
    {
        $user = Hrs_leavebalances::where('EmployeeID',$EmployeeID)->get();
        return view('users.editleavebalance')->with('user', $user);
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $user=User::where('id', $User->id)
                              ->update([
                                'EmployeeID'=>$request->input('EmployeeID'),
                                'FirstName'=>$request->input('FirstName'),
                                'LastName'=>$request->input('LastName'),
                                'Dob'=>$request->input('Dob'),
                                'Gender'=>$request->input('Gender'),
                                'JobTitle'=>$request->input('JobTitle'),
                                'DateOfEmployment'=>$request->input('DateOfEmployment'),
                                'DateOfLastPromotion'=>$request->input('DateOfLastPromotion'),
                                'MaritalStatus'=>$request->input('MaritalStatus'),
                                'EntitledLeaveDays'=>$request->input('EntitledLeaveDays'),
                                'Nationality'=>$request->input('Nationality'),
                                'NationalIDNum'=>$request->input('NationalIDNum'),
                                'BirthCertificateNum'=>$request->input('BirthCertificateNum'),
                                'CurrentStatus'=>$request->input('CurrentStatus'),
                                'PayrollDepartment'=>$request->input('PayrollDepartment'),
                                'AbsorbedInNIMR'=>$request->input('AbsorbedInNIMR'),
                                'email'=>$request->input('email'),
                                'UpdatedBy'=>auth::user()->email
                                       ]);
if ($user){
    //return back()->withinput()->with('success','Updated Successfully');
    return redirect()->route('user.index')->with('success','Information Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating');
    }



    public function updatestaffaddresses(Request $request)
    {
        $user=Hrs_3staffaddress::where('EmployeeID', $request->input('EmployeeID'))
                              ->update([
                                'StaffCurrentAddress'=>$request->input('StaffCurrentAddress'),
                                'StaffHomeAddress'=>$request->input('StaffHomeAddress'),
                                'HomeRegion'=>$request->input('HomeRegion'),
                                'HomeDistrict'=>$request->input('HomeDistrict'),
                                'StaffTelephone1'=>$request->input('StaffTelephone1'),
                                'StaffTelephone2'=>$request->input('StaffTelephone2'),
                                'StaffEmail1'=>$request->input('StaffEmail1'),
                                'StaffEmail2'=>$request->input('StaffEmail2'),
                                'EmegencyContantPerson'=>$request->input('EmegencyContantPerson'),
                                'EmegencyContactNumber'=>$request->input('EmegencyContactNumber'),
                                'UpdatedBy'=>auth::user()->email
                                       ]);
if ($user){
    //return back()->withinput()->with('success','Updated Successfully');
    return redirect()->route('user.staffaddresses')->with('success','Information Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating');
    }

/******************************  Update Profile************************************************ */
    public function updateprofile(Request $request)
    {
        $user=User::where('id', auth::user()->id)
                              ->update([
                                'first_name'=>$request->input('first_name'),
                                'last_name'=>$request->input('last_name'),
                                'facility_name'=>$request->input('facility_name'),
                                'profession'=>$request->input('profession'),
                                'email'=>$request->input('email'),
                                'UpdatedBy'=>auth::user()->email,
                                       ]);
if ($user){

    return back()->withinput()
            ->with('success','Profile Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating Profile');
    }



    /******************************  Update Profile************************************************ */
    public function updateleavebalance(Request $request)
    {
        $user=Hrs_leavebalances::where('EmployeeID', $request->input('EmployeeID'))
                              ->update([
                                'Balance'=>$request->input('Balance'),
                                'UpdatedBy'=>auth::user()->email,
                                       ]);
if ($user){
    return redirect()->route('user.staffleavebalance')->with('success','Leave Balance Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating Leave Balance');
    }



    
/******************************  Update Password************************************************ */
    public function updatepassword(Request $request)
    {
       //if ( Hash::make($request->input('oldpassword')) != auth::user()->password){   

        if (!Hash::check($request->input('oldpassword'), auth::user()->password)) {
            return back()->withinput()->with('errors','Unable to Change Password Old Password is not Correct');

       } elseif ($request->input('password') != $request->input('password_confirmation')){
        return back()->withinput()->with('errors','Unable to Change Password, Password Mis Match');
       }else{


        $user=User::where('id', auth::user()->id)
                              ->update([
                                'password'=>Hash::make($request->input('password')),
                                'UpdatedBy'=>auth::user()->email,
                                       ]);
if ($user){

    return back()->withinput()
            ->with('success','Password Updated Successfully, Please Logout to Use your New Password');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating Password');
    }
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
