<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar', ''));

        $insumos = Insumo::when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('nombre', 'like', "%{$buscar}%")
                      ->orWhere('codigo', 'like', "%{$buscar}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('insumos.index', compact('insumos', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->reglas());

        unset($data['imagen']);
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->guardarImagen($request->file('imagen'));
        }

        Insumo::create($data);

        return redirect()->route('insumos.index')->with('success', 'Insumo registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumos)
    {
        return view('insumos.edit', compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $data = $request->validate($this->reglas($insumo));

        unset($data['imagen']);
        if ($request->hasFile('imagen')) {
            $this->borrarImagen($insumo->imagen);
            $data['imagen'] = $this->guardarImagen($request->file('imagen'));
        }

        $insumo->update($data);

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        $this->borrarImagen($insumo->imagen);
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado del catálogo.');
    }

    private function reglas(?Insumo $insumo = null): array
    {
        return [
            'codigo' => ['required', 'string', 'max:50',
                Rule::unique('insumos', 'codigo')->ignore($insumo?->id)],
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['required', Rule::in(Insumo::CATEGORIAS)],
            'precio' => ['required', 'numeric', 'gt:0'],
            'costo' => ['required', 'numeric', 'min:0'],
            'inventario' => ['required', 'integer', 'min:0'],
            'fabricante' => ['required', 'string', 'max:255'],
            'fecha_registro' => ['required', 'date'],
            'fecha_vencimiento' => ['nullable', 'date', 'after_or_equal:fecha_registro'],
            'numero_lote' => ['required', 'string', 'max:100'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'], // 5 MB
        ];
    }

    private function guardarImagen(UploadedFile $archivo): string
    {
        $nombre = Str::uuid() . '.' . $archivo->extension();
        $archivo->move(public_path('uploads/insumos'), $nombre);

        return 'uploads/insumos/' . $nombre;
    }

    private function borrarImagen(?string $ruta): void
    {
        if ($ruta) {
            File::delete(public_path($ruta));
        }
    }
}
