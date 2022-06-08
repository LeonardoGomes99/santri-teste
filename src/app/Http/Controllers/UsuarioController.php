<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Traits\CheckAuth;
use App\Models\Autorizacoes;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    protected $Usuario;
    protected $Autorizacoes;
    use CheckAuth;

    public function __construct(Usuario $Usuario, Autorizacoes $Autorizacoes)
    {
        $this->usuario = $Usuario;
        $this->autorizacoes = $Autorizacoes;
    }    

    public function index()
    {

        $authFiltered = $this->getAuths();

        return view('pesquisaUsuarios', [
            'autorizacoes' => $authFiltered,  
       ]);

    }

    public function create()
    {
       $LastRecord = $this->usuario->orderBy('USUARIO_ID', 'desc')->first();        
       return view('cadastroUsuarios', ['id' => $LastRecord->USUARIO_ID+1]);
    }

    public function store(Request $request)
    {
        $this->checkRequest($request);

        try{
            $this->usuario->saveUsuario($request);
            $this->autorizacoes->saveAutorizacao($request);
            return response()->json(['url' => '/ListaUsuarios'], 200);
        }catch(Exception){
            return response()->json(['message' => 'Não foi possível cadastrar o usuário'], 500);
        }
        
    }

    public function all()
    {

       $usuarios = $this->usuario->all();
       $authFiltered = $this->getAuths();
       $id = session('USUARIO_ID');

        return view('tabelaUsuarios', [
             'usuarios' => $usuarios,
             'autorizacoes' => $authFiltered,  
             'USUARIO_ID' => $id,
        ]);
    }

    public function find(Request $request)
    {
       

       $usuarios = $this->usuario->findByNome($request->NOME_COMPLETO);
       $authFiltered = $this->getAuths();
       $id = session('USUARIO_ID');

        return view('tabelaUsuarios', [
             'usuarios' => $usuarios,
             'autorizacoes' => $authFiltered,  
             'USUARIO_ID' => $id,
        ]);
        
    }

    public function findById($id){
        $usuario = $this->usuario->where('USUARIO_ID', $id)->get();
        $autorizacoes = $this->getAuthsToEdit($id);

        return view('editarUsuarios',[
            'usuario' => $usuario,
            'autorizacoes' => $autorizacoes
        ]);
    }

    public function delete($id)
    {
        if($id == session('USUARIO_ID')){
            return response()->json(['message' => 'Não foi possível excluir o usuário'], 500);
        }

        $this->autorizacoes->find($id)->delete();
        $this->usuario->find($id)->delete();
    }

    public function update(Request $request)
    {
        $this->autorizacoes->where('USUARIO_ID' , $request->USUARIO_ID)->delete();
        $this->usuario->updateUsuario($request);
        $this->autorizacoes->saveAutorizacao($request);


        // try{
        //     return 'Ok';
        // }catch(Exception){
        //     return response()->json(['message' => 'Não foi possível cadastrar o usuário'], 500);
        // }
    }
}
