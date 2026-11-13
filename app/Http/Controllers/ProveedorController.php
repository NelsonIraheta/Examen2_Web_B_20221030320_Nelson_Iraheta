<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);

        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Proveedor::create($request->validate($this->reglas()));

        return redirect()->route('proveedores.index')->with('success', 'Proveedor registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->validate($this->reglas($proveedor)));

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }

    private function reglas(?Proveedor $proveedor = null): array
    {
        return [
            'rtn' => ['required', 'digits:14',
                Rule::unique('proveedores', 'rtn')->ignore($proveedor?->id)],
            'empresa' => ['required', 'string', 'max:255'],
            'contacto' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'regex:/^[2389][0-9]{7}$/'],   // 8 dígitos, inicia en 2, 3, 8 o 9
            'categoria' => ['required', Rule::in(Proveedor::CATEGORIAS)],
            'limite_credito' => ['required', 'numeric', 'min:0'],
            'dias_credito' => ['required', Rule::in(array_keys(Proveedor::DIAS_CREDITO))],
            'estado' => ['required', Rule::in(Proveedor::ESTADOS)],
            'fecha_registro' => ['required', 'date'],
        ];
    }
}
