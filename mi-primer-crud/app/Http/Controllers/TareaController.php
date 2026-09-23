<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
* Muestra el listado de tareas (INDEX)
*/
public function index()
{
$tareas = Tarea::orderBy('created_at', 'desc')->get();
return view('tareas.index', compact('tareas'));
}
/**
* Muestra el formulario para crear una nueva tarea (CREATE)
*/
public function create()
{
return view('tareas.create');
}
/**
* Guarda la nueva tarea en la BD (STORE)
*/
public function store(Request $request)
{
        // Validación de los datos del formulario
        $request->validate([
            'titulo'       => 'required|string|max:150',
            'descripcion'  => 'nullable|string',
            'completada'   => 'nullable|boolean',
            'fecha_limite' => 'nullable|date',
        ]);
        // Crear la tarea
        Tarea::create([
            'titulo'       => $request->titulo,
            'descripcion'  => $request->descripcion,
            'completada'   => $request->has('completada'),
            'fecha_limite' => $request->fecha_limite,
        ]);
        return redirect()
            ->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }
    /**
     * Muestra una tarea específica (SHOW)
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }
    /**
     * Muestra el formulario para editar una tarea (EDIT)
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }
    /**
     * Actualiza la tarea en la BD (UPDATE)
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo'       => 'required|string|max:150',
            'descripcion'  => 'nullable|string',
            'completada'   => 'nullable|boolean',
            'fecha_limite' => 'nullable|date',
        ]);
        $tarea->update([
            'titulo'       => $request->titulo,
            'descripcion'  => $request->descripcion,
            'completada'   => $request->has('completada'),
            'fecha_limite' => $request->fecha_limite,
        ]);
    return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }
            /**
            * Elimina una tarea (DESTROY)
            */
        public function destroy(Tarea $tarea)
                {
                $tarea->delete();
                return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
                }
                }
