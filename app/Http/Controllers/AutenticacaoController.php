<?php

namespace App\Http\Controllers;

use App\Models\Autenticacao;
use Exception;
use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function loginShow(Request $request) {

        return view('autenticacao.loginShow');

    }
    public function cadastroShow(Request $request) {

        return view('autenticacao.cadastroShow');

    }

    public function create(Request $request, ) {

        try{

            $novoRegistro = new Autenticacao();

            $novoRegistro->nome = $request->nome;
            $novoRegistro->email = $request->email;
            $novoRegistro->senha = $request->senha;
    
            $novoRegistro->save();
    
            flash('Registro concluído com sucesso')->success();
            return redirect()->route('login.show');

        }catch(Exception $e) {

            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function autenticar(Request $request) {

        try{
            $registros = Autenticacao::all();
        
        foreach($registros as $registro) {
            if($registro->email == $request->email && $registro->senha == $request->senha) {
                session_start();

                $_SESSION['id'] = (integer) $registro->id;
                $_SESSION['nome'] = $registro->nome;
                $_SESSION['autenticado'] = true;

                flash('Seção iniciada')->success();
                return redirect()->route('produtos.show');
            }

        }

        }catch(Exception $e) {

            flash($e->getMessage())->error();
            return redirect()->back();
        }
        

    }



}
