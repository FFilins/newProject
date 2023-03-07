@extends('layout.layout')

@section('content')
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
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection