<?php

namespace App\Http\Controllers\api;
use App\Http\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibir uma lista do recurso
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // rota principal
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar o formulário para criar um novo recurso
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Armazene um recurso recém-criado no armazenamento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Usuario::create($request->all());
    }

    /**
     * Display the specified resource.
     * Exibe o recurso especificado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        echo "hello";
       //Usuario::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     * Mostrar o formulário para editar o recurso especificado
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Atualize o recurso especificado no armazenamento.
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
     * Remova o recurso especificado do armazenamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
