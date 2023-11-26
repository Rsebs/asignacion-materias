<?php

namespace App\Http\Controllers;

use App\Models\CourseProfessor;
use Illuminate\Http\Request;

class CourseProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professorId  = $request->professor_id;
        $courseIds  = $request->course_ids;

        $courseProfessortData = array_map(function ($courseId) use ($professorId) {
            return [
                'professor_id' => $professorId,
                'course_id' => $courseId,
            ];
        }, $courseIds);

        if (CourseProfessor::insert($courseProfessortData)) {
            return response()->json([
                'data' => $courseProfessortData,
                'msg' => 'Registro guardado con éxito'
            ]);
        }

        return response()->json([
            'error' => true,
            'msg' => 'Hubo un error al guardar el registro'
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
