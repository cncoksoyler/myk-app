<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Carbon\Carbon;
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

        $exams = Exam::orderBy('id', 'desc')->get();
        //dd($Exams);
        return view('exams.exam_list', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exam = Exam::all();
        return view('exams.exam_add', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required | max:255',
            'period' => 'required | max:255',
            'exam_date' => 'required | date',
            'description' => 'required | max:255'
        ]);
        // $now = Carbon::now();
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->period = $request->period;
        $exam->exam_date = $request->exam_date;
        $exam->last_application_date = $request->exam_date;
        $exam->is_active = $request->is_active === "on" ? "1" : "0";
        $exam->description = $request->description;
        $exam->save();

        return redirect()->route('exams.index')
            ->with([
                'message' => "Sınav başarıyla eklendi",
                'message_type' => 'success'
            ]);
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
