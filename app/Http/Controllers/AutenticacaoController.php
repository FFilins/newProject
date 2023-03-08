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

            $registros = Autenticacao::all();

            if(!isset($registros[0])) {

                $novoRegistro = new Autenticacao();

                $novoRegistro->nome = $request->nome;
                $novoRegistro->email = $request->email;
                $novoRegistro->senha = $request->senha;
                $novoRegistro->administrador = (boolean)$request->administrador;

                $novoRegistro->save();
                
                flash('Registro concluído com sucesso')->success();
                return redirect()->route('login.show');

            }

            $usuarioAutenticado = false;

            foreach($registros as $registro) {
                if($registro->email == $request->email) {
                    $usuarioAutenticado = true;
                }
            }

            if($usuarioAutenticado == true) {
                throw new Exception('O email já está em uso.');

            }else{

                $novoRegistro = new Autenticacao();

                $novoRegistro->nome = $request->nome;
                $novoRegistro->email = $request->email;
                $novoRegistro->senha = $request->senha;
                $novoRegistro->administrador = (boolean)$request->administrador;

                
                $novoRegistro->save();
                
                flash('Registro concluído com sucesso')->success();
                return redirect()->route('login.show');
    
            }

        }catch(Exception $e) {

            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function autenticar(Request $request) {

        try{
            $registros = Autenticacao::all();

            if(!isset($registros[0])) {
                flash('Ainda não há registros, seja o primeiro a se cadsatrar!')->warning();
                return redirect()->route('cadastro.show');
            }

        $usuarioAutenticado = false;

        foreach($registros as $registro) {
            if($registro->email == $request->email && $registro->senha == $request->senha) {
                $usuarioAutenticado = true;
            }
        }

        if($usuarioAutenticado == true) {
            session_start();

            $_SESSION['id'] = (integer) $registro->id;
            $_SESSION['nome'] = $registro->nome;
            $_SESSION['autenticado'] = true;
            $_SESSION['administrador'] = (boolean)$registro->administrador;

            flash('Seção iniciada')->success();
            return redirect()->route('produtos.show');
        }else{

        flash('Email ou senha incorreto(s)')->error();
        return redirect()->back();
        }


        }catch(Exception $e) {

            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }

    public function sair(Request $request) {

        @session_start();
        @session_destroy();
        return redirect()->route('produtos.show');

    }



}
