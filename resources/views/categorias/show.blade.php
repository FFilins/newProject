@extends('layout.layout')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-2">

            <form action="{{route('categoria.createView')}}">
                <button  type="submit"  class="btn btn-primary">
                    Criar categoria
                </button>
            </form>
    
        </div>
    
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria )
                    <tr>
                        <th scope="row">{{$categoria->id}}</th>
                        <td>{{$categoria->nome}}</td>
                        <td>

                            <div class="row">
                                <form action="{{route('categoria.delete' , $categoria->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Delete  
                                    </button> 
                                </form>
                                <td>
                            
                                    <a href="{{route('categoria.updateView' , $categoria->id)}}"  class="btn btn-warning">
                                        update  
                                    </a> 
                              
                                </td>
                            </div>
                          
                        </td>
                
                      </tr>
                    @endforeach
               
        
                </tbody>
              </table>
        </div>
    </div>
 
</div>
@endsection
