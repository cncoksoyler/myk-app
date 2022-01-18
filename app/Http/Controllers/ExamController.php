<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        
        $exams = Exam::all();
        //dd($Exams);
        return view('exams.exam_list',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //buraya validateCategory tarzı bir fonkisyon alınabilir
        // $validated = $request->validate([
        //     'name'=>'required|max:20',
        //     'AMG'=>'required',
        //     'area'=>'required'

        // ]);
       
        // dd([
        //     'name'=>$request->name,
        //     'surname'=> $request->surname,
        //     'TC'=>$request->TC,
        //     'mobile'=>$request->mobile,
        //     'workplace'=>$request->workplace,
        //     'profession_id'=>(int)($request->profession),
        //     'speciality_detail'=>$profession_detail[0]->name,
        //     'subspeciality_detail'=>$request->subspeciality_detail,

        // ]);
    
        return 'store';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $Exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        return 'destroy';
    }
}
