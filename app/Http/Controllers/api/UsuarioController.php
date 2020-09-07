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
        $usuarios = Usuario::all();
        return response()->json($usuarios);
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
        if ($request->isMethod('post')) {

            $data = ['nome' => $request->nome,
                     'email' => $request->email,
                     'senha' => bcrypt($request->senha),
                     'perfil' => $request->perfil,
                     'status' => $request->status,
                     'remember_token' => $request->remember_token];

           Usuario::create($data);
       }
   }
        
    /**
     * Display the specified resource.
     * Exibe o recurso especificado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $usuario = Usuario::find($id);

       if($usuario != NULL || $usuario != "")
       {
            if($usuario->status == 'Ativo')
            {
              return response()->json($usuario);
            }else{
              return 'Contate o administrador do sistema.';
            }
       }else{
            //abort(404, 'Unauthorized action.');
            return 'Usuário não encontrado.';
       }
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
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * Remova o recurso especificado do armazenamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Enum Status 'Ativo','Inativo','Bloqueado','Em Análise' */

        $usuario = Usuario::findOrFail($id);
            if($usuario->status != 'Inativo')
            {
             $usuario->status = 'Inativo';
             $usuario->update();    
            }
    }
}
