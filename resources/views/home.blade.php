@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Lista de Canciones</h1>
    
    @if (auth()->user() && auth()->user()->is_admin)
        <div class="mb-8 text-center">
            <a href="{{ route('songs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                Crear Nueva Canción
            </a>
        </div>
    @endif

    @if($songs->isEmpty())
        <p class="text-center text-gray-600">No hay canciones registradas.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($songs as $song)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-800">{{ $song->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $song->author }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('songs.show', $song) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">
                                Ver Detalles
                            </a>
                            
                            @if (auth()->user() && auth()->user()->is_admin)
                                <div class="flex space-x-2">
                                    <a href="{{ route('songs.edit', $song) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">
                                        Editar
                                    </a>
                                    <form action="{{ route('songs.destroy', $song) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out" onclick="return confirm('¿Estás seguro de que quieres eliminar esta canción?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
