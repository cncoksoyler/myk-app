<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Profession;
use Brick\Math\BigInteger;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

        $applicants = Applicant::with('profession')->paginate(20);
        //dd($applicants);
        return view('applicants.applicant_list', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profession = Profession::all();
        return view('applicants.applicant_add', compact('profession'));
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
        $profession_detail = Profession::where('id', $request->profession)->get('name');

        $request->validate(
            [
                'name' => 'required | string | max:255',
                'surname' => 'required | string | max:255',
                'TC' => 'required | numeric |unique:applicants,TC| digits:11 |ends_with:0,2,4,6,8',
                'mobile' => 'required|regex:/(5)[0-9]{9}/|digits:10',
                'workplace' => 'string | max:255',
                'speciality_detail' => 'string | max:255',
                'subspeciality_detail' => 'string | max:255',
            ],
            [
                'name.required' => 'İsim girilmesi gereklidir',
                'surname.required' => 'Soyisim girilmesi gereklidir',
                'TC.required' => 'Bir TC girilmesi gereklidir',
                'TC.numeric' => 'Eksik ya da hatalı bir TC giriniz',
                'TC.digits' => 'Eksik ya da hatalı bir TC giriniz',
                'TC.ends_with' => 'Eksik ya da hatalı bir TC giriniz',
                'TC.unique' => 'Bu TC \'de bir kişi daha önce eklenmiş',
                'mobile.required' => 'Telefon numarası girilmesi gereklidir',
                'mobile.regex' => 'Eksik ya da hatalı bir telefon numarası girdiniz',
                'mobile.digits' => 'Eksik ya da hatalı bir telefon numarası girdiniz',


            ]
        );

        // dd($request);
        Applicant::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'TC' => $request->TC,
            'mobile' => $request->mobile,
            'workplace' => $request->workplace,
            'profession_id' => $request->profession,
            'speciality_detail' => $profession_detail[0]->name,
            'subspeciality_detail' => $request->subspeciality_detail,

        ]);


        return redirect()->route('applicants.index')
            ->with([
                'message' => "Aday başarıyla eklendi",
                'message_type' => 'success'
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
