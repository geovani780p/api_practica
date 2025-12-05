<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Http\Requests\LibroRequest;
use App\Http\Resources\LibroResource;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::query()->latest()->get();
        return LibroResource::collection($libros);
    } 
    public function store(LibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return (new LibroResource($libro))
            ->response()
            ->setStatusCode(201);
    }
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return new LibroResource($libro);
    }

    public function update(LibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->validated());
        return new LibroResource($libro);
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado'], 200);
    }
}
