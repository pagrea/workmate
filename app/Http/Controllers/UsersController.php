<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Department;
use App\Dependant;
use App\Exports\StaffinfoExports;
use App\Exports\HodlistExports;
use Maatwebsite\Excel\Facades\Excel;
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
                \Session::put('search1', $Search);
                $users = User::where('id','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('EmployeeID','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')
                
                ->orWhere('highest_education_level','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('Gender','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('JobTitle','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('MaritalStatus','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('Nationality','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('NationalIDNum','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('highest_education_level','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('email','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->paginate(50);
 
        return view('users.index',['users'=>$users]);
            }else{
                \Session::put('search1', '');
            $users = User::where('Department','!=', 'Not Available') ->paginate(10);
            return view('users.index',['users'=>$users]);
        }
    }
    }

    public function hodlist(Request $request)
    {
        if (Auth::check()){

            $staffNames  = User::where('Department','!=', 'Not Available')
            ->where('UserRole', 'User')
            ->orderBy('FirstName')
            ->get();

            $Search = $request->input('Search');
            if ($Search !=""){
                \Session::put('search1', $Search);
                $users = User::where('FirstName','LIKE', '%' . $Search . '%')
                ->where('UserRole', 'Hod')
                ->where('Department','!=', 'Not Available')
                
                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->where('UserRole', 'Hod')
                ->where('Department','!=', 'Not Available')
                ->paginate(50);
 
        return view('users.hodlist', compact('users','staffNames'));
            }else{
                \Session::put('search1', '');
            $users = User::where('Department','!=', 'Not Available')
            ->where('UserRole', 'Hod')
             ->paginate(10);
            return view('users.hodlist', compact('users','staffNames'));
        }
    }
    }

    public function staffleavebalance(Request $request)
    {
        if (Auth::check()){

            $Search = $request->input('Search');
            if ($Search !=""){
                $users = User::where('id','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('EmployeeID','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('FirstName','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->orWhere('LastName','LIKE', '%' . $Search . '%')
                ->where('Department','!=', 'Not Available')

                ->paginate(10);
 
        return view('users.staffleavebalance',['users'=>$users]);
            }else{
            $users = User::where('Department','!=', 'Not Available')
            ->paginate(10);
            
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

    public function createdependant($id)
    {
        //
        $User  = User::find($id);
        return view('users.createdependant')->with('User', $User);
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
//
            $validatedData = $request->validate([
                'EmployeeID' => 'required|string',
                'FirstName' => 'required|string',
                'username' => 'required|string',
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
                     'username'=>$request->input('username'),
                     'Dob'=>$request->input('Dob'),
                     'Gender'=>$request->input('Gender'),
                     'JobTitle'=>$request->input('JobTitle'),
                     'highest_education_level'=>$request->input('highest_education_level'),
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


public function storedependant(Request $request)
{

     if (Auth::check()){

        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'gender' => 'required|string',
            'relationship' => 'required|string',
            ]);

        $id=$request->input('user_id');
       $addusers=Dependant::create([
                 'user_id'=>$request->input('user_id'),
                 'name'=>$request->input('name'),
                 'gender'=>$request->input('gender'),
                 'relationship'=>$request->input('relationship'),
                 'updated_by'=>auth::user()->email
                 ]);

                 if($addusers){
            return redirect()->route('user.show',['user'=>$id])->with('success','Dependant Information has been saved Successfully');;

    }else{
        return back()->withinput()->with('errors','Error Occured, Probably this information exist');
    }
}
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $User  = User::find($user->id);
        $dependants  = Dependant::where('user_id',$User->id) ->orderBy('dependant_number', 'ASC')->get();
        return view('users.show',compact('User','dependants'));

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


    public function editprofile()
    {
        //
        $User  = User::find(auth::user()->id);
        $dependants  = Dependant::where('user_id',$User->id) ->orderBy('dependant_number', 'ASC')->get();
        return view('users.show',compact('User','dependants'));
    }

    public function editdependant($id)
    {
        //
        $User  = Dependant::find($id);
        return view('users.editdependant')->with('User', $User);
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
            //'PhoneNumber' => 'required|regex:/(0)[0-9]{9}/',
            //'EmegencyContactNumber' => 'required|regex:/(0)[0-9]{9}/',
            //'StaffHomeAddress' => 'required|string',
            //'StaffCurrentAddress' => 'required|string',
            ]);
        $user=User::where('id', $User->id)
                ->update([
                'EmployeeID'=>$request->input('EmployeeID'),
                'FirstName'=>$request->input('FirstName'),
                'LastName'=>$request->input('LastName'),
                'Dob'=>$request->input('Dob'),
                'Gender'=>$request->input('Gender'),
                'JobTitle'=>$request->input('JobTitle'),
                'highest_education_level'=>$request->input('highest_education_level'),
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

    public function updatedependant(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'gender' => 'required|string',
            'relationship' => 'required|string',
            ]);

        $id=$request->input('user_id');
        $editdependant=Dependant::where('id', $request->input('id'))
                              ->update([
                 'user_id'=>$request->input('user_id'),
                 'name'=>$request->input('name'),
                 'gender'=>$request->input('gender'),
                 'relationship'=>$request->input('relationship'),
                 'updated_by'=>auth::user()->email
                 ]);

                 if($editdependant){
            return redirect()->route('user.show',['user'=>$id])->with('success','Dependant Information has been saved Successfully');
}

       return back()->withinput()->with('errors','Error Updating Dependant');
    }

    public function removehod($id)
    {
        $remove=User::where('id', $id)
                              ->update([
                 'UserRole'=>'User',
                 'UpdatedBy'=>auth::user()->email
                 ]);
    if($remove){
        return back()->withinput()->with('success','Successfully Staff Removed in the HOD list');
}
       return back()->withinput()->with('errors','Error Updating Staff');
    }

    public function addhod(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required|string',
            ]);
        $remove=User::where('id', $request->input('staff_id'))
                              ->update([
                 'UserRole'=>'Hod',
                 'UpdatedBy'=>auth::user()->email
                 ]);
    if($remove){
        return back()->with('success','Successfully Staff Added in the HOD list');
}
       return back()->withinput()->with('errors','Error Updating Staff');
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


    public function userexportpdf($id)
    {
      // Fetch all customers from database
      $User  = User::find($id);
      $dependants  = Dependant::where('user_id',$User->id) ->orderBy('dependant_number', 'ASC')->get();
      // Send data to the view using loadView function of PDF facade
        $pdf = \PDF::loadView('users.expTopdf',compact('User','dependants'));
    
      // Finally, you can download the file using download function
        return $pdf->download('PDFExports.pdf');
    }
    //*********************************End Export to PDF ********************************

//*********************************Export to Excel ********************************
    public function Exportstaffdata() 
    {
        return Excel::download(new StaffinfoExports, 'Staffinformation.xlsx');
    }

    public function Exporthodlist() 
    {
        return Excel::download(new HodlistExports, 'HodlistExports.xlsx');
    }
    //*********************************End Export to Excel ********************************

}
