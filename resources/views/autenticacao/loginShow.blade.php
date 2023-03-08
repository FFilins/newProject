@extends('layout.layout')
{{-- @php
    if(isset($_SESSION['autenticado'])){
      if($_SESSION['autenticado'] == true){
        redirect()->route('produtos.show');
      }
    }
@endphp --}}
@section('content')
<div class="row">
  <div class="col col-md12 col-lg-6">
    <form action="{{route('login.autenticar')}}" method="post">
      @csrf
        <!-- Email input -->
        <div class="form-outline mb-4 ">
          <input type="email" name="email" class="form-control" />
          <label class="form-label" for="form2Example1">Email address</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="senha" class="form-control" />
          <label class="form-label" for="form2Example2">Password</label>
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      
        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="#!">Register</a></p>
        </div>
      </form>
  </div>
</div>

@endsection