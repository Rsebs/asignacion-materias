<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
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
        $inputs = $request->input();
        $course = Course::create($inputs);
        return response()->json([
            'data' => $course,
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
        $course = Course::find($id);

        if (isset($course)) {
            return response()->json([
                'data' => $course,
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
        $course = Course::find($id);
        if (isset($course)) {
            if ($course->update($request->all())) {
                return response()->json([
                    'data' => $course,
                    'msg' => 'Registro actualizado con exito'
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
        $Course = Course::find($id);
        if (isset($Course)) {
            if ($Course->delete()) {
                return response()->json([
                    'data' => $Course,
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
        return Inertia::render('Admin/Courses/Index');
    }

    public function createView()
    {
        return Inertia::render('Admin/Courses/Create');
    }

    public function editView(Course $course)
    {
        return Inertia::render('Admin/Courses/Edit', compact('course'));
    }

    public function showView(Course $course)
    {
        return Inertia::render('Admin/Courses/Show', compact('course'));
    }
}
