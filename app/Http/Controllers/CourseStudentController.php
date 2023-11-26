<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::with('professors')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentId  = $request->student_id;
        $courseIds  = $request->course_ids;

        $courseStudentData = array_map(function ($courseId) use ($studentId) {
            return [
                'student_id' => $studentId,
                'course_id' => $courseId,
            ];
        }, $courseIds);

        if (CourseStudent::insert($courseStudentData)) {
            return response()->json([
                'data' => $courseStudentData,
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
