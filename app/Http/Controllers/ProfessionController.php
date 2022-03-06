<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::paginate(10);
        return view('professions.profession_list', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profession = Profession::all();
        $levels = [
            'Seviye 1',
            'Seviye 2',
            'Seviye 3',
            'Seviye 4',
            'Seviye 5'
        ];
        // dd($levels);
        return view('professions.profession_add', compact('profession', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate(
            [

                'name' => 'required|string|max:255',
                // 'level' => ['required','string,''max:255',unique:'professions',name,id']
                'level' => 'unique:professions,level,NULL,id,name,' . request('name'),
            ],
            [
                'name.required' => 'Uzmanlık adı girilmesi gereklidir',
                'name.max' => 'Maksimum karakter sınırı aşılmıştır',
                'level.unique' => 'Bu uzmanlık daha önce eklenmiştir'
            ]
        );

        // dd($request, $validated);

        $profession = new Profession;
        $profession->name = $request->name;
        $profession->level = $request->level;
        $profession->save();


        return redirect()->route('professions.index')
            ->with([
                'message' => "Uzmanlık başarıyla eklendi",
                'message_type' => 'success'
            ]);
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
        //
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
