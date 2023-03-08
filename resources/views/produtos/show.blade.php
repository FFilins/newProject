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

            <form action="{{route('produto.createView')}}">
                <button  type="submit"  class="btn btn-primary">
                    Criar produto
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
                    <th scope="col">Preco</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Categoria</th>
                    @if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && $_SESSION['administrador'] == true)
                    <th scope="col2">Actions</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @if(count($produtos))
                        @foreach ($produtos as $produto )
                        <tr>
                            <th scope="row">{{$produto->id}}</th>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->preco}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->quantidade}}</td>
                            <td>{{$produto->categoria()->first()->nome}}</td>

                            @if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true && $_SESSION['administrador'] == true)
                            <td>

                                <div class="row">
                                    <form action="{{route('produto.delete' , $produto->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            Delete  
                                        </button> 
                                    </form>
                                    <td>
                                
                                        <a href="{{route('produto.updateView' , $produto->id)}}"  class="btn btn-warning">
                                            update  
                                        </a> 
                                
                                    </td>
                                </div>
                            
                            </td>
                            @endif
                            
                        </tr>
                        @endforeach
                    @endif
        
                </tbody>
              </table>
        </div>
    </div>
 
</div>
@endsection
