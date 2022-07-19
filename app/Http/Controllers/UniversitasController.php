<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Universitas;
use Illuminate\Http\Request;

class UniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('universitas.index', [
            'universitas'   => Universitas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universitas.create',[
            'program'   =>  Program::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_universitas'      =>  'required|max:255',
            'alamat'                =>  'required',
            'program_id'            =>  'required'
        ]);

        Universitas::create($validatedData);

        return redirect('/universitas')->with('success', "New Universitas has been added!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Universitas $universita)
    {
        return view('universitas.edit',[
            'program'       => Program::all(),
            'universitas'   => $universita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Universitas $universita)
    {
        $validatedData = $request->validate([
            'nama_universitas'      =>  'required|max:255',
            'alamat'                =>  'required',
            'program_id'            =>  'required'
        ]);

        Universitas::where('id', $universita->id)
                ->update($validatedData);

        return redirect('/universitas')->with('success', "New Universitas has been added!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universitas $universita)
    {
        Universitas::destroy($universita->id);

        return redirect('/universitas')->with('success', "Universitas has been deleted");
    }
}
