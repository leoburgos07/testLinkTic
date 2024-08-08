@extends('layouts.app')

@section('content')
    <div class="container mt-4  w-50">
        <h2 class="text-center">Login</h2>
        <form action="{{ route('sign') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico:</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control" id="">
            </div>

            <button type="submit" class="btn btn-primary">Ingresar</button>
            <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
        </form>
    </div>

    @include('components.alertMessage')
@endsection
