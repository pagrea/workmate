<?php

namespace App\Http\Controllers;
use App\Hrs_departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MedicalCaseController;

class DepartmentController extends Controller
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
                $departments = Hrs_departments::where('id','LIKE', '%' . $Search . '%')
                ->orWhere('DepartmentName','LIKE', '%' . $Search . '%')
                ->orWhere('DepartmentDescription','LIKE', '%' . $Search . '%')
                ->paginate(10);
        return view('departments.index',['department'=>$departments]);
            }else{
            $departments = Hrs_departments::where('id','!=',0) ->paginate(10);
            return view('departments.index',['department'=>$departments]);
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
        return view('departments.create');
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
            $departments=Hrs_departments::create([
                                    'DepartmentName'=>$request->input('DepartmentName'),
                                    'DepartmentDescription'=>$request->input('DepartmentDescription'),
                                    'UpdatedBy'=>auth::user()->email
                                 ]);
        if ($departments){
        return redirect()->route('departments.index')->with('success','Information have been saved Successfully.');
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
    public function edit(Hrs_departments $department)
    {
        //
        $departments  = Hrs_departments::find($department->id);
        return view('departments.edit',['departments'=>$departments]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrs_departments $department)
    {
        $departments=Hrs_departments::where('id', $department->id)
                              ->update([
                                'DepartmentName'=>$request->input('DepartmentName'),
                                'DepartmentDescription'=>$request->input('DepartmentDescription'),
                                'UpdatedBy'=>auth::user()->email,
                                       ]);
if ($departments){

    return redirect()->route('departments.index')->with('success','Information have been saved Successfully.');
}

        //redirect
       // return back()->withinput();
       return back()->withinput()->with('errors','Error Updating');
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
