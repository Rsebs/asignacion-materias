<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::with('city')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $student = Student::create($inputs);
        return response()->json([
            'data' => $student,
            'msg' => 'Registro agregado con éxito'
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
        $student = Student::with('city')->find($id);

        if (isset($student)) {
            return response()->json([
                'data' => $student,
                'msg' => 'Registro encontrado'
            ]);
        }

        return response()->json([
            'error' => true,
            'msg' => 'El registro no existe'
        ]);
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
        $student = Student::find($id);
        if (isset($student)) {
            if ($student->update($request->all())) {
                return response()->json([
                    'data' => $student,
                    'msg' => 'Registro actualizado con éxito'
                ]);
            }

            return response()->json([
                'error' => true,
                'msg' => 'No se logró actualizar el registro'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'msg' => 'No existe el registro'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (isset($student)) {
            if ($student->delete()) {
                return response()->json([
                    'data' => $student,
                    'msg' => 'Registro eliminado con éxito'
                ]);
            }

            return response()->json([
                'error' => true,
                'msg' => 'No se logró eliminar el registro'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'msg' => 'No existe el registro'
            ]);
        }
    }

    // ================= VIEWS =================
    public function indexView()
    {
        return Inertia::render('Admin/Students/Index');
    }

    public function createView()
    {
        return Inertia::render('Admin/Students/Create');
    }

    public function editView(Student $student)
    {
        $coursesStudent = $student->courses;
        return Inertia::render('Admin/Students/Edit', compact('student', 'coursesStudent'));
    }

    public function showView(Student $student)
    {
        $city = $student->city;
        $courses = $student->courses;
        return Inertia::render('Admin/Students/Show', compact('student', 'city', 'courses'));
    }
}
