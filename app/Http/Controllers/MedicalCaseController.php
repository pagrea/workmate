<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medical_case;
use App\Patient;
use App\Medical_case_answer;

class MedicalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Get all medicalcases
        $medicalCases = Medical_case::all();
        
        // call view and pass var
        return view('index', ['medicalCases' => $medicalCases]);
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
        // Get the data from tablet in POST call
        // medical_case as a JSON data
        //dd($request);

        $json = json_encode($request->input('medical_case'));
        $data = $request->input('medical_case');

        if (!array_key_exists('id', $data['patient'])) {
            // create patient
            $newPatient = Patient::create([
                'birthdate' => $data['patient']['birthdate'],
                'firstname'=> $data['patient']['firstname'],
                'lastname'=> $data['patient']['lastname'],
                'gender'=> $data['patient']['gender'],
            ]);

             // create medicalcase
            $newMedicalCase = Medical_case::create([
                'medicalCaseJson' => $json,
                'createdDate' => $data['createdDate'],
                'status' => $data['status'],
                'patient_id' => $newPatient->id,
            ]);
            
            $creation = array(
                "patient" => $newPatient,
                "medicalCase" => $newMedicalCase
            );

            $nodes = json_decode($json);
        
        // loop on each node and create an entry for the question
        foreach( $nodes->nodes as $node){
            if ($node->type == 'Question') {
                // call the model answer
                $newAnswer = Medical_case_answer::create([
                    'answer' => $node->answer,
                    'value' => $node->value,
                    'label' => $node->label,
                    'reference' => $node->reference,
                    'medical_case_id' => $newMedicalCase->id
                ]);
            }
        }  
            return $creation;

        }
        
        
        // respond to the answer
        return '{"response": "insert successfully"}';
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
        $json = json_encode($request->input('medical_case'));
        $data = $request->input('medical_case');
        
        // Find medicalcase and update the json and status
        $updateMedicalCase = Medical_case::find($data['id'])->update([
            'medicalCaseJson' => $json,
            'status' => $data['status'],
        ]);

        $nodes = json_decode($json);
        
        // loop on each node and update the entry for the question
        foreach( $nodes->nodes as $node){
            if ($node->type == 'Question') {
                // call the model answer
                $answer = Medical_case_answer::where('reference', $node->reference)->where('medical_case_id', $data['id'])->update([
                    'answer' => $node->answer,
                    'value' => $node->value,
                ]);
            }
        } 
        // Return the new medicalCase
        return Medical_case::find($data['id']);
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
