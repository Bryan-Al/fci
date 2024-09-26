@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-8">
            <h1 class="text-4xl font-bold mb-4 text-gray-800">{{ $song->title }}</h1>
            <p class="text-xl text-gray-600 mb-6">Por {{ $song->author }}</p>
            
            <div class="bg-gray-100 p-6 rounded-lg mb-6">
                <pre class="whitespace-pre-wrap text-gray-800 font-sans">{{ $song->lyrics }}</pre>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('songs.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    Volver a la lista
                </a>

                @if (auth()->user() && auth()->user()->is_admin)
                    <div class="flex space-x-4">
                        <a href="{{ route('songs.edit', $song) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            Editar
                        </a>
                        <form action="{{ route('songs.destroy', $song) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" onclick="return confirm('¿Estás seguro de que quieres eliminar esta canción?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection