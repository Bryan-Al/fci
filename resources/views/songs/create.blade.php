@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-8">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
                {{ isset($song) ? 'Editar Canción' : 'Crear Nueva Canción' }}
            </h1>
            
            <form action="{{ isset($song) ? route('songs.update', $song) : route('songs.store') }}" method="POST">
                @csrf
                @if(isset($song))
                    @method('PUT')
                @endif

                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                    <input type="text" name="title" id="title" value="{{ $song->title ?? old('title') }}" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-6">
                    <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Autor:</label>
                    <input type="text" name="author" id="author" value="{{ $song->author ?? old('author') }}" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-6">
                    <label for="lyrics" class="block text-gray-700 text-sm font-bold mb-2">Letra:</label>
                    <textarea name="lyrics" id="lyrics" rows="10" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $song->lyrics ?? old('lyrics') }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_visible" value="1" {{ (isset($song) && $song->is_visible) || old('is_visible', true) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">Visible para todos los usuarios</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        {{ isset($song) ? 'Actualizar' : 'Crear' }}
                    </button>
                    <a href="{{ route('songs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection