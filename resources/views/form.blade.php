@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <form action="{{ $form_edit ? route('actualizar') : route('guardar') }}" method="POST">
            @csrf
            @if ($form_edit)
                <input type="hidden" value="{{ $animal->id }}" name='id' />
            @endif

            <div class="form-group mt-2">
                <label for="nombre">Nombre del animal:</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="nombre del animal" name="nombre"
                    placeholder="Ejemplo: Mono" required value="{{ $form_edit ? $animal->nombre : '' }}">
            </div>
            <div class="form-group mt-2">
                <label for="especie">Especie:</label>
                <select name="especie" id="especie" class="form-control">
                    @foreach ($especies as $data)
                        <option value="{{ $data->id }}"
                            {{ $form_edit ? ($animal->especie == $data->id ? 'selected' : '') : '' }}>
                            {{ $data->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="especie">Habitat:</label>
                <select name="habitat" id="habitat" class="form-control">
                    @foreach ($habitats as $data)
                        <option value="{{ $data->id }}"
                            {{ $form_edit ? ($animal->habitat == $data->id ? 'selected' : '') : '' }}>
                            {{ $data->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3 px-3">{{ $form_edit ? 'Actualizar' : 'Guardar' }}</button>
        </form>
    </div>
@endsection
