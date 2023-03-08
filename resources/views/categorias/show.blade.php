@extends('layout.layout')

@section('content')
<div class="container">
    @php
    if(!isset($_SESSION)){
      session_start();
    }
    @endphp
    @if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && $_SESSION['administrador'] == true)
    <div class="row">
        <div class="col-2">

            <form action="{{route('categoria.createView')}}">
                <button  type="submit"  class="btn btn-primary">
                    Criar categoria
                </button>
            </form>
    
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    @if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && $_SESSION['administrador'] == true)
                    <th scope="col2">Actions</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria )
                    <tr>
                        <th scope="row">{{$categoria->id}}</th>
                        <td>{{$categoria->nome}}</td>

                        @if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && $_SESSION['administrador'] == true)

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
                        @endif
                        
                      </tr>
                    @endforeach
               
        
                </tbody>
              </table>
        </div>
    </div>
 
</div>
@endsection
