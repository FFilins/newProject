@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <form action="{{route('produto.update', $produto->id)}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                  <input type="text" value="{{$produto->nome}}" class="form-control" name="nome" id="produto" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Digite aqui o nome do produto.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Preco</label>
                    <input type="text" value="{{$produto->preco}}" class="form-control" name="preco" id="produto" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Digite aqui o preço do produto.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Peso</label>
                    <input type="text" value="{{$produto->peso}}" class="form-control" name="peso" id="produto" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Digite aqui o peso do produto.</div>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categoria</label>
                    <select class="form-control" name="categoria_id" id="">
                        <option selected disabled hidden>Selecine uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <div id="emailHelp" class="form-text">selecione aqui a categoria.</div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    
    </div>
</div>


@endsection