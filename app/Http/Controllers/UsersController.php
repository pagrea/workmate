<?php
namespace App\Http\Controllers;
use App\User;
use App\Department;
//use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;


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

    public function staffleavebalance(Request $request)
    {
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $users = User::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('EmployeeID','LIKE', '%' . $Search . '%')
                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->paginate(10);
 
        return view('users.staffleavebalance',['users'=>$users]);
            }else{
            $users = User::paginate(10);
            
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
       $departments = Department::where('id','!=',0)->get();
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

            $validatedData = $request->validate([
                'EmployeeID' => 'required|string',
                'FirstName' => 'required|string',
                'LastName' => 'required|string',
                'Dob' => 'required|date',
                'Gender' => 'required|string',
                'JobTitle' => 'required|string',
                'DateOfEmployment' => 'date',
                'DateOfLastPromotion' => 'date',
                'MaritalStatus' => 'required|string',
                'LeaveBalance' => 'required|integer',
                'Nationality' => 'required|string',
                'NationalIDNum' => 'string',
                'BirthCertificateNum' => 'string',
                'CurrentStatus' => 'required|string',
                'Department' => 'required|string',
                'AbsorbedInNIMR' => 'required|string',
                'email' => 'required|email|string',
                'PhoneNumber' => 'required|regex:/(0)[0-9]{9}/',
                'EmegencyContactNumber' => 'required|regex:/(0)[0-9]{9}/',
                'StaffHomeAddress' => 'required|string',
                'StaffCurrentAddress' => 'required|string',
                ]);

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
                     'LeaveBalance'=>$request->input('LeaveBalance'),
                     'Nationality'=>$request->input('Nationality'),
                     'NationalIDNum'=>$request->input('NationalIDNum'),
                     'BirthCertificateNum'=>$request->input('BirthCertificateNum'),
                     'CurrentStatus'=>$request->input('CurrentStatus'),
                     'PayrollDepartment'=>$request->input('PayrollDepartment'),
                     'AbsorbedInNIMR'=>$request->input('AbsorbedInNIMR'),
                     'email'=>$request->input('email'),
                     'OtherEmail'=>$request->input('OtherEmail'),
                     'PhoneNumber'=>$request->input('PhoneNumber'),
                     'EmegencyContantPerson'=>$request->input('EmegencyContantPerson'),
                     'EmegencyContactNumber'=>$request->input('EmegencyContactNumber'),
                     'StaffCurrentAddress'=>$request->input('StaffCurrentAddress'),
                     'StaffHomeAddress'=>$request->input('StaffHomeAddress'),
                     'password'=>Hash::make($request->input('password')),
                     'UpdatedBy'=>auth::user()->email
                     ]);

                     if($addusers){
                return redirect()->route('user.index')->with('success','Information have been saved Successfully, Now fill the staff address here.');;

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
    public function edit(User $user)
    {
        //
        $departments = Department::where('id','!=',0)->get();
        $User  = User::find($user->id);
        $roles = Role::get();
        $userRole = $User->roles->pluck('name','name')->all();
        return view('users.edit')->with('departments', $departments)->with('User', $User)
                                 ->with('roles', $roles)->with('userRole', $userRole);

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

    public function editleavebalance($id)
    {

        $users  = User::find($id);
        return view('users.editleavebalance',compact('users'));
    }

    public function editbulkleavebalance()
    {
        return view('users.editbulkleavebalance');
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

        $validatedData = $request->validate([
            'EmployeeID' => 'required|string',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Dob' => 'required|date',
            'Gender' => 'required|string',
            'JobTitle' => 'required|string',
            'DateOfEmployment' => 'date',
            'DateOfLastPromotion' => 'date',
            'MaritalStatus' => 'required|string',
            'LeaveBalance' => 'required|integer',
            'Nationality' => 'required|string',
            'NationalIDNum' => 'string',
            'BirthCertificateNum' => 'string',
            'CurrentStatus' => 'required|string',
            'Department' => 'required|string',
            'AbsorbedInNIMR' => 'required|string',
            'email' => 'required|email|string',
            'PhoneNumber' => 'required|regex:/(0)[0-9]{9}/',
            'EmegencyContactNumber' => 'required|regex:/(0)[0-9]{9}/',
            'StaffHomeAddress' => 'required|string',
            'StaffCurrentAddress' => 'required|string',
            ]);
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
                                'LeaveBalance'=>$request->input('LeaveBalance'),
                                'Nationality'=>$request->input('Nationality'),
                                'NationalIDNum'=>$request->input('NationalIDNum'),
                                'BirthCertificateNum'=>$request->input('BirthCertificateNum'),
                                'CurrentStatus'=>$request->input('CurrentStatus'),
                                'Department'=>$request->input('Department'),
                                'AbsorbedInNIMR'=>$request->input('AbsorbedInNIMR'),
                                'email'=>$request->input('email'),
                                'OtherEmail'=>$request->input('OtherEmail'),
                                'PhoneNumber'=>$request->input('PhoneNumber'),
                                'EmegencyContantPerson'=>$request->input('EmegencyContantPerson'),
                                'EmegencyContactNumber'=>$request->input('EmegencyContactNumber'),
                                'StaffCurrentAddress'=>$request->input('StaffCurrentAddress'),
                                'StaffHomeAddress'=>$request->input('StaffHomeAddress'),
                                'UpdatedBy'=>auth::user()->email
                                       ]);

        //Update the User's role
        $updatedUser = User::find($User->id);
        DB::table('model_has_roles')->where('model_id',$User->id)->delete();

        $updateRoles = $updatedUser->assignRole($request->input('roles'));

if ($user && $updateRoles){
    //return back()->withinput()->with('success','Updated Successfully');
    return redirect()->route('user.index')->with('success','Information Updated Successfully');
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

    public function updateleavebalance(Request $request)
    {

        $validatedData = $request->validate([
            'LeaveBalance' => 'required|integer',
            ]);
        $user=User::where('EmployeeID', $request->input('EmployeeID'))
                              ->update([
                                'LeaveBalance'=>$request->input('LeaveBalance'),
                                'UpdatedBy'=>auth::user()->email,
                                       ]);
if ($user){

    return back()->withinput()
            ->with('success','Leave balance Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating Profile');
    }

    public function updatebulkleavebalance(Request $request)
    {

        $TypeofUpdate=$request->input('TypeofUpdate');
        $Days=$request->input('Days');

        $validatedData = $request->validate([
            'Days' => 'required|integer',
            ]);

            $users = User::all();

            foreach($users as $user){
                if ($TypeofUpdate == "Add"){
                    $balance=$user->LeaveBalance + $Days;
                }else{
                    $balance=$user->LeaveBalance - $Days;
                }
                        $user=User::where('id', $user->id)
                              ->update([
                                'LeaveBalance'=>$balance,
                                'UpdatedBy'=>auth::user()->email,
                        ]);
        }

        $users = User::where('LeaveBalance','>',56)->get();
        foreach($users as $user){
                    $user=User::where('id', $user->id)
                          ->update([
                            'LeaveBalance'=>'56',
                    ]);
    }


if ($user){

    return back()->withinput()
            ->with('success','Leave balance for all staff Updated Successfully');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating Profile');
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
