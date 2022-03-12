<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return 'index';
        dd($request);

        //dd($results);
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        // $applicants = Applicant::all();
        $exam_id = $request->examid;
        // dd($request, $exam_id);
        return view('results.result_add', compact('request', 'exam_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Result::create([
            'exam_id' => $request->query('exam_id'),
            'applicant_id' => $request->query('applicant_id')

        ]);

        return redirect()->route('results.show', $request->query('exam_id'))
            ->with([
                'message' => "Kişi başarıyla eklendi",
                'message_type' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id)
    {

        $exam = Exam::where('id', $exam_id)->with(['results', 'results.applicant'])->firstOrFail();

        return view('results.result_list', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $result)
    {
        // dd($request, $result);

        foreach ($request->input("resultforuser") as $resultid => $note) {

            $result = Result::find($resultid);
            $result->result = $note;
            $result->save();
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $Result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {

        return 'destroy';
    }
}
