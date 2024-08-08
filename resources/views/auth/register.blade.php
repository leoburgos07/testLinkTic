@extends('layouts.app')

@section('content')
    <div class="container mt-4  w-50">
        <h2 class="text-center">Registro</h2>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nombre completo:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    aria-describedby="emailHelp">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    aria-describedby="emailHelp">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="{{ route('login') }}" class="btn btn-success">regresar</a>
        </form>
    </div>
    @include('components.alertMessage')
@endsection
