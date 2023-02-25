@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <form action="{{route('categoria.update' , $categoria->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nome da Categoria</label>
                  <input type="text" value="{{$categoria->nome}}" class="form-control" name="categoria" id="categoria" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Digite aqui o nome da categoria.</div>
                </div>
      
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    
    </div>
</div>


@endsection