<?php

namespace App\Http\Controllers\api;
use App\Http\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioAuthController extends Controller
{
    
    /**
     * User authentication function.
     * Função autenticação de usuario.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $email = $request->input('email');
        $senha = $request->input('senha');

        if((($email != null) && ($email != "")) && (($senha != null) && ($senha != "")))
        {
            echo "$email"." $senha";
            //chama model
        }else{
            echo "Atenção campo Nulo ou Vazio!";
        }
        
    }

}
