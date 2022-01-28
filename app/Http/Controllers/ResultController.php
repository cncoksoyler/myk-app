<?php

namespace App\Http\Controllers;

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
    public function create()
    {
       
       return view('results.result_add',compact('profession'));
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
        $profession_detail = Result::where('id',$request->profession)->get('name');

    
        Result::create([
            'name'=>$request->name,
            'surname'=> $request->surname,
            'TC'=>$request->TC,
            'mobile'=>$request->mobile,
            'workplace'=>$request->workplace,
            'profession_id'=>$request->profession,
            'speciality_detail'=>$profession_detail[0]->name,
            'subspeciality_detail'=>$request->subspeciality_detail,

        ]);


        return redirect()->route('results.index')
        ->with([
            'message' =>"Ürününüz başarıyla eklendi",
            'message_type' =>'success'
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
        $data = Result::with('examDetails','applicantDetails')->where('id',$id)->get();
        // dd($data[0]);
        return view('results.result_list',compact('data'));
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
