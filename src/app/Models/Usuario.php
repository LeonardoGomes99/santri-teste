<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'usuarios';
    protected $primaryKey = 'USUARIO_ID';

    protected $fillable = [
        'LOGIN',
        'SENHA',
        'ATIVO',
        'NOME_COMPLETO',
    ];

    protected $casts = [
        'LOGIN' => 'string',
        'SENHA' => 'string',
        'ATIVO' => 'string',
        'NOME_COMPLETO' => 'string',
    ];

    public function autorizacoes()
    {
        return $this->hasMany(Autorizacoes::class);
    }

    public function login($request)
    {
        return Usuario::where("LOGIN",$request->LOGIN)->where("SENHA",$request->SENHA)->first();
    }

    public function findByNome($nome)
    {
        return Usuario::where("NOME_COMPLETO", 'LIKE', '%' . $nome . '%')->get();
    }

    public function saveUsuario($request)
    {
        $usuario = New Usuario();
        $usuario->USUARIO_ID = $request->USUARIO_ID;
        $usuario->LOGIN =  $request->LOGIN;
        $usuario->SENHA =  $request->SENHA;
        $usuario->ATIVO = $request->ATIVO;
        $usuario->NOME_COMPLETO =  $request->NOME_COMPLETO;
        $usuario->save();
    }

    public function updateUsuario($request)
    {        
        return Usuario::where('USUARIO_ID', $request->USUARIO_ID)->update([            
            'LOGIN' => $request->LOGIN , 
            'SENHA' => $request->SENHA , 
            'ATIVO' => $request->ATIVO ,
            'NOME_COMPLETO' => $request->NOME_COMPLETO, 
        ]);
    }
}
