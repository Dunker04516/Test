@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <a class="btn btn-primary my-4" href="{{ route('crear') }}">Agregar animal</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Especie</th>
                    <th scope="col">Habitat</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($animales))
                    @foreach ($animales as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>
                                {{ $data->nombre }}
                            </td>
                            <td>
                                @foreach ($especies as $especie)
                                    @if ($especie->id == $data->especie)
                                        {{ $especie->nombre }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($habitats as $habitat)
                                    @if ($habitat->id == $data->habitat)
                                        {{ $habitat->nombre }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('eliminar') }}" method="POST">
                                    @csrf
                                    <a class="btn btn-success" href="{{ route('editar', $data->id) }}">Editar</a>
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="5" class="text-center">No existen registros</td>
                @endif
            </tbody>
        </table>
    </div>
@endsection
