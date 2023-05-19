<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  </head>
  <body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form id="login_form"  class="form_class" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form_div">
                <label>Login:</label>
                <input class="field_class"  id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <label>Password:</label>
                <input class="field_class" id="password" type="password" name="password" required>
                <button class="submit_class" type="submit">Entrar</button>
            </div>
        </form>
    </main>
    <footer>
        <p><a href="#">For Better Health Customers;</a></p>
    </footer>
</body>
</html>




{{-- @extends('layout')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
@endsection --}}
