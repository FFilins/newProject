<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function createView( Request $request)
    {
        session_start();
        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
            if($_SESSION['administrador'] == true){
                $categorias = Categoria::all();
                return view('produtos.create')->with(compact('categorias'));
            }else {
                flash('Você não tem permissão para Criar novos produtos')->error();
                return redirect()->back();
            }
        }else {
            flash('Você não tem permissão para Criar novos produtos')->error();
            return redirect()->back();
        }
        
    }
    public function show( Request $request)
    {
        $produtos = Produto::all();
        return view('produtos.show')->with(compact('produtos'));
    }


    public function updateView( Request $request , $produtoId)
    {
        session_start();
        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
            if($_SESSION['administrador'] == true){

                        
                $produto = Produto::find($produtoId);
                
                if(!$produto)
                {
                    flash('produto não encontrado')->error();
                    return redirect()->back();
                }

                $categorias = Categoria::all();

                if(!$categorias)
                {
                    flash('Categorias não encontradas')->error();
                    return redirect()->back();
                }
                return view('produtos.update')->with(compact('produto', 'categorias'));

            }else {
                flash('Você não tem permissão para atualizar os produtos')->error();
                return redirect()->back();
            }
        }else {
            flash('Você não tem permissão para atualizar os produtos')->error();
            return redirect()->back();
        }

    }


    public function create( Request $request)
    {
        try{
            $novoProduto = new Produto();

            $novoProduto->nome = $request->nome;
            $novoProduto->preco = (float) $request->preco;
            $novoProduto->peso = (float) $request->peso;
            $novoProduto->quantidade = (integer) $request->quantidade;
            $novoProduto->categoria_id = $request->categoria_id;
    
            $novoProduto->save();
// https://github.com/laracasts/flash
            flash('Novo produto criado com sucesso')->success();
            return redirect()->route('produtos.show');
            
        }catch(Exception $e)
        {
            
            flash($e->getMessage())->error();
            return redirect()->back();
        }


    }


    public function delete( Request $request, $produtoId)
    {

        session_start();
        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
            if($_SESSION['administrador'] == true){
                try{
                    $produto = Produto::find($produtoId);
        
                    if(!$produto){
                        throw new Exception('Server Error : produto não encontrado');
                    }
                    
        
                    $deletedProduto = $produto->delete();
        
                    if($deletedProduto)
                    {
                    
                        flash('Produto deletada com sucesso')->success();
                        return redirect()->back();
                    }else {
                        throw new Exception('Server Error : produto não deletado, erro desconhecido');
                    }
                }catch(Exception $e)
                {
                    flash($e->getMessage())->error();
                    return redirect()->back();
                }
            }else {
                flash('Você não tem permissão para Deletar produtos')->error();
                return redirect()->back();
            }
        }else {
            flash('Você não tem permissão para Deletar produtos')->error();
            return redirect()->back();
        }

        

    }

    public function update( Request $request, $produtoId)
    {

        try{

            $produto = Produto::find($produtoId);

            if(!$produto){
                throw new Exception('Server Error : Produto não encontrado');
            }
    
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->peso = $request->peso;
            $produto->quantidade = $request->quantidade;
            $produto->categoria_id = $request->categoria_id;
    
            $updatedProduto = $produto->update();

            if(!$updatedProduto)
            {
                throw new Exception('Server error : erro em atualizar produto');
            }

            flash('Produto atualizado com sucesso')->success();
            return redirect()->route('produtos.show');
        }catch(Exception $e)
        {
            flash($e->getMessage())->error();
            return redirect()->back();
        }

    }
}
