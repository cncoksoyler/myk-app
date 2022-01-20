<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Profession;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        
        $applicants = Applicant::with('modelProfession')->paginate(20);
        //dd($applicants);
        return view('applicants.applicant_list',compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $profession=Profession::all();
        return view('applicants.applicant_add',compact('profession'));
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
        $profession_detail = Profession::where('id',$request->profession)->get('name');

    
        Applicant::create([
            'name'=>$request->name,
            'surname'=> $request->surname,
            'TC'=>$request->TC,
            'mobile'=>$request->mobile,
            'workplace'=>$request->workplace,
            'profession_id'=>$request->profession,
            'speciality_detail'=>$profession_detail[0]->name,
            'subspeciality_detail'=>$request->subspeciality_detail,

        ]);


        return redirect()->route('applicants.index')
        ->with([
            'message' =>"Ürününüz başarıyla eklendi",
            'message_type' =>'success'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        return 'destroy';
    }
}
