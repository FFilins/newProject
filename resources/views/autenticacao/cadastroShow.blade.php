@extends('layout.layout')

@section('content')
<div class="row">
  <div class="col col-md-12 col-lg-6">
    <form action="{{route('autenticacao.create')}}" method="post">
      @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nome Completo</label>
          <input class="form-control" name="nome" placeholder="Seu nome">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de email</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Seu email">
          <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>

        <div class="form-group form-check">
          <input type="checkbox" name="administrador" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">você é administrador?</label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

@endsection