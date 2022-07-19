<?php

namespace App\Http\Controllers\api;

use App\Models\Universitas;
use App\Http\Requests\StoreUniversitasRequest;
use App\Http\Requests\UpdateUniversitasRequest;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Http\Resources\UniversitasResource;
use Illuminate\Support\Facades\Validator;

class UniversitasController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universitas = Universitas::all();
        
        return $this->SendResponse(UniversitasResource::collection($universitas), 'Universitas called!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUniversitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniversitasRequest $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nama_universitas'  => 'required',
            'alamat'            => 'required',
            'program_id'        => 'required'
        ]);

        if($validator->failed()){
            return $this->SendError('Validation Error', $validator->errors());
        }

        $universitas = Universitas::create($input);

        return $this->SendResponse(new UniversitasResource($universitas), 'Universitas added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $universitas = Universitas::find($id);

        if(is_null($universitas)){
            return $this->SendError('Universitas not found!');
        }

        return $this->SendResponse(new UniversitasResource($universitas), 'Universitas called!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUniversitasRequest  $request
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniversitasRequest $request, Universitas $universita)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_universitas'      => 'required',
            'alamat'                => 'required',
            'program_id'            => 'required'
        ]);

        if($validator->fails()){
            return $this->SendError('Validation Error!', $validator->errors());
        }

        $universita->nama_universitas  = $input['nama_universitas'];
        $universita->alamat            = $input['alamat'];
        $universita->program_id        = $input['program_id'];
        $universita->save();

        return $this->SendResponse(new UniversitasResource($universita), 'Universitas updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universitas  $universitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universitas $universita)
    {
        $universita->delete();

        return $this->SendResponse([], 'Universitas deleted!');
    }


}
