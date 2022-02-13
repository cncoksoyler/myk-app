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
    public function index()
    {
        // return 'index';


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
        dd($request);
        // $applicants = Applicant::all();
        return view('results.result_add', compact('request'));
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
        // dd($request);
        // $profession_detail = Result::where('id', $request->profession)->get('name');


        Result::create([
            'exam_id' => $request->examid,
            'applicant_id' => $request->id

        ]);


        return redirect()->route('results.show', $request->examid)
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
    public function show($id)
    {

        $data = Result::where('exam_id', $id)->with('examDetails', 'applicantDetails')->paginate(20);

        if ($data[0] === null) {
            $dummy = Exam::where('id', $id)->firstOrFail();
            return view('results.result_list', compact('dummy', 'data'));
        } else {
            return view('results.result_list', compact('data'));
        }
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
    public function update(Request $request, Result $result)
    {
        return 'update';
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
