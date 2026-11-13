<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Empleado::create($request->validate($this->reglas()));

        return redirect()->route('empleados.index')->with('success', 'Empleado registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->validate($this->reglas($empleado)));

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado de la nómina.');
    }

    private function reglas(?Empleado $empleado = null): array
    {
        return [
            'identidad' => ['required', 'digits:13',
                Rule::unique('empleados', 'identidad')->ignore($empleado?->id)],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255',
                Rule::unique('empleados', 'correo')->ignore($empleado?->id)],
            'cargo' => ['required', Rule::in(array_keys(Empleado::CARGOS))],
            'salario' => ['required', 'numeric', 'gt:0'],
            'fecha_ingreso' => ['required', 'date'],
            'estado' => ['required', Rule::in(Empleado::ESTADOS)],
        ];
    }
}
