<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    //

    public function show( Request $request)
    {



        $categorias = Categoria::all();
        return view('categorias.show')->with(compact('categorias'));
    }

    public function createView( Request $request)
    {

        return view('categorias.create');
    }

    public function updateView( Request $request , $categoriaId)
    {

        $categoria = Categoria::find($categoriaId);

        if(!$categoria)
        {
            flash('categoria nao encontrada')->error();
            return redirect()->back();
        }
        return view('categorias.update')->with(compact('categoria'));
    }


    public function create( Request $request)
    {

        try{

            $novaCategoria = new Categoria();

            $novaCategoria->nome = $request->categoria;

            $criadaNovaCategoria = $novaCategoria->save();

            if(!$criadaNovaCategoria)
            {
                throw new Exception(' Server Error: erro ao criar nova categoria');
            }

            flash('categoria criada com sucesso')->success();
            return redirect()->route('categorias.show');
        }catch(Exception $e)
        {
            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }
    public function delete( Request $request, $categoriaId)
    {

        try{
            $categoria = Categoria::find($categoriaId);

            if(!$categoria){
                throw new Exception('Server Error : categoria nao encontrada');
            }
            

            $deletedCategory = $categoria->delete();

            if($deletedCategory)
            {
            
                flash('Categoria deletada com sucesso')->success();
                return redirect()->back();
            }
        }catch(Exception $e)
        {
            flash($e->getMessage())->error();
            return redirect()->back();
        }

    }

    public function update( Request $request, $categoriaId)
    {

        try{
            $categoria = Categoria::find($categoriaId);

            if(!$categoria){
                throw new Exception('Server Error : categoria nao encontrada');
            }
    
            $categoria->nome = $request->categoria;
    
            $updatedCategoria = $categoria->update();

            if(!$updatedCategoria)
            {
                throw new Exception('Server error : erro em atualizar categoria');
            }

            flash('Categoria atualizada com sucesso')->success();
            return redirect()->route('categorias.show');
        }catch(Exception $e)
        {
            flash($e->getMessage())->error();
            return redirect()->back();
        }



    }
}
