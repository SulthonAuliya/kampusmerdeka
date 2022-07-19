<?php

namespace App\Http\Controllers\api;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Http\Requests\UpdateProgramRequest;
use App\Http\Resources\ProgramResource;
use Illuminate\Support\Facades\Validator;

class ProgramController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();

        return $this->SendResponse(ProgramResource::collection($programs), 'Program called!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nama_program'  => 'required',
            'description'   =>  'required'
        ]);

        if($validator->failed()){
            return $this->SendError('Validation Error', $validator->errors());
        }

        $program = Program::create($input);

        return $this->SendResponse(new ProgramResource($program), 'Program added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);

        if(is_null($program)){ 
            return $this->SendError('Program not found!');
        }

        return $this->SendResponse(new ProgramResource($program), 'Program called!');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramRequest  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_program'      => 'required',
            'description'       => 'required'
        ]);

        if($validator->fails()){
            return $this->SendError('Validation Error!', $validator->errors());
        }

        $program->nama_program  = $input['nama_program'];
        $program->description   = $input['description'];
        $program->save();

        return $this->SendResponse(new ProgramResource($program), 'Program updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return $this->SendResponse([], 'Program deleted!');
    }
}
