@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mb-4">Listado de Salas</h1>

    <div class="mb-3">
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Crear Sala
        </a>
    </div>

    @if($rooms->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay salas registradas.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->description }}</td>
                            <td>{{ $room->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- Botón de ver -->
                                  <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="bi bi-pencil"></i> Ver
                                </a>
                                <!-- Botón de Editar -->
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm text-white">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Formulario para eliminar -->
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sala?');">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div>
@endsection
