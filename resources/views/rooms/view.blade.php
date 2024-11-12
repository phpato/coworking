@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/rooms" class="btn btn-info text-white mb-4">Volver a Salas</a>

    <h1 class="mb-4">Listado de Reservaciones <b>{{ $room->name }}<b></h1>

    @if($reservations->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay reservaciones registradas.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Sala</th>
                        <th>Estado</th>
                        <th>Editar Estado</th>
                        <th>Hora de inicio</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->room->name }}</td>
                            <td>
                                @if ($reservation->status == 'Pending')
                                    <span class="badge text-bg-warning">Pendiente</span>
                                @elseif ($reservation->status == 'Accepted')
                                    <span class="badge text-bg-success">Aceptado</span>
                                @elseif ($reservation->status == 'Rejected')
                                    <span class="badge text-bg-danger">Rechazado</span>
                                @else
                                    <span class="badge text-bg-secondary">Estado desconocido</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="Pending" {{ $reservation->status == 'Pending' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="Accepted" {{ $reservation->status == 'Accepted' ? 'selected' : '' }}>Aceptado</option>
                                        <option value="Rejected" {{ $reservation->status == 'Rejected' ? 'selected' : '' }}>Rechazado</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $reservation->start_time }}</td>
                            <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
