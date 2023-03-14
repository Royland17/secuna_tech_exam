<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();

        if($user->hasPermission('view-program')){
            $data = Program::paginate(10);

            return $data;
        }

        abort(403, 'Forbidden! user is not authorized to this action.');
    }

    /**
     *
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $user = request()->user();

        if($user->hasPermission('create-program')){
            $data = $request->validated();

            $program = Program::create($data);

            return $program;
        }

        abort(403, 'Forbidden! user is not authorized to this action.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = request()->user();

        if($user->hasPermission('view-program')){
            $data = Program::with('bugReports')->find($id);

            return $data;
        }

        abort(403, 'Forbidden! user is not authorized to this action.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, string $id)
    {
        $user = request()->user();

        if($user->hasPermission('edit-program')){

            $data = $request->validated();

            $program = Program::find($id);

            $program->update($data);

            return $program;
        }

        abort(403, 'Forbidden! user is not authorized to this action.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = request()->user();

        if($user->hasPermission('delete-program')){

            Program::destroy($id);

            return response()->noContent();
        }

        abort(403, 'Forbidden! user is not authorized to this action.');
    }
}
