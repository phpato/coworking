@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Bienvenido <b>{{ auth()->user()->name }}</b></h1>
    <h1 class="mb-4">Listado de Mis Reservaciones</h1>
    <div class="mb-3">
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Crear Reservación
        </a>
    </div>

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
