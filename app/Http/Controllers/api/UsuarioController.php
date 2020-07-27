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
        header('Content-type:application/json');
        header("Accept: application/json");
        header("charset=UTF-8");
 
        // rota principal
        return json_encode(Usuario::all());
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
        /*
        Podemos usar esta forma de encryption

        https://www.tutorialspoint.com/laravel/laravel_encryption.htm#:~:text=The%20process%20of%20converting%20cipher%20text%20to%20plain,cannot%20be%20tampered%20with%20once%20it%20is%20encrypted.
        
        */
        if ($request->isMethod('post')) {
            Usuario::create($request->all());
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
        //
       header('Content-type:application/json');
       header("Accept: application/json");
       header("charset=UTF-8");
       
       $usuario = Usuario::find($id);
       if($usuario != NULL || $usuario != "")
       {
            if($usuario->status == 'Ativo')
            {
              return json_encode($usuario);
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
        //
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
