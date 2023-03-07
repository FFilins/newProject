@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <form action="{{route('produto.create')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                  <input type="text" class="form-control" name="nome" id="produto" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Digite aqui o nome do produto.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Preco</label>
                    <input type="text" class="form-control" name="preco" id="produto" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Digite aqui o preço do produto.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Peso</label>
                    <input type="text" class="form-control" name="peso" id="produto" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Digite aqui o peso do produto.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" id="produto" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Digite aqui a quantidade do produto.</div>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categoria</label>
                    <select class="form-control" name="categoria_id" id="">
                        <option value="" selected disabled hidden>Selecine uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <div id="emailHelp" class="form-text">selecione aqui a categoria.</div>
                  </div>
                <button type="submit" class="btn btn-primary">Adicionar produto</button>
              </form>
        </div>
    
    </div>
</div>


@endsection