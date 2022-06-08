<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacoes extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'autorizacoes';
    protected $primaryKey = 'USUARIO_ID';

    protected $fillable = [
        'USUARIO_ID',
        'CHAVE_AUTORIZACAO',
    ];

    protected $casts = [
        'USUARIO_ID' => 'integer',
        'CHAVE_AUTORIZACAO' => 'string',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function findAll($id){
        return Autorizacoes::where('USUARIO_ID',$id)->get();
    }

    public function saveAutorizacao($request)
    {
        foreach($request->AUTHS as $key=>$value){
            if($value !== '0'){
                $autorizacoes = New Autorizacoes();
                $autorizacoes->USUARIO_ID = $request->USUARIO_ID;
                $autorizacoes->CHAVE_AUTORIZACAO = $value;
                $autorizacoes->save();
            }
        }
    }
}
