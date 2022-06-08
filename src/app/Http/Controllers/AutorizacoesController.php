<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AutorizacoesController extends Controller
{

    protected $Usuario;

    public function __construct(Usuario $Usuario)
    {
        $this->usuario = $Usuario;
    }

    public function login(Request $request)
    {
        $check = $this->usuario->login($request);
        if($check){
            session(['USUARIO_ID' => $check->USUARIO_ID ]);
            return response()->json(['url' => '/ListaUsuarios'], 200);
        }
        return response()->json(['message' => 'Usuário não encontrado'], 500);

    }
}
