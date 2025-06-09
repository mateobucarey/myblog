@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Registrarse</h2>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Registrarse
            </button>

            <p class="mt-6 text-center text-sm text-gray-600">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión</a>
            </p>
        </form>
    </div>
</div>
@endsection
