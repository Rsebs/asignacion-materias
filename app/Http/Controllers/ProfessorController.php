<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Professor::with('city')->get();
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
        $professor = Professor::create($inputs);
        return response()->json([
            'data' => $professor,
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
        $professor = Professor::find($id);

        if (isset($professor)) {
            return response()->json([
                'data' => $professor,
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
        $professor = Professor::find($id);
        if (isset($professor)) {
            if ($professor->update($request->all())) {
                return response()->json([
                    'data' => $professor,
                    'msg' => 'Registrp actualizado con éxito'
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
        $professor = Professor::find($id);
        if (isset($professor)) {
            if ($professor->delete()) {
                return response()->json([
                    'data' => $professor,
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
        return Inertia::render('Admin/Professors/Index');
    }

    public function createView()
    {
        return Inertia::render('Admin/Professors/Create');
    }

    public function editView(Professor $professor)
    {
        $coursesProfessor = $professor->courses;
        return Inertia::render('Admin/Professors/Edit', compact('professor', 'coursesProfessor'));
    }

    public function showView(Professor $professor)
    {
        $city = $professor->city;
        $courses = $professor->courses;
        return Inertia::render('Admin/Professors/Show', compact('professor', 'city', 'courses'));
    }
}
