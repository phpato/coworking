@extends('layouts.app')

@section('content')
<div class="container">
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
    <h1 class="mb-4">Crear Reserva</h1>
    <a href="/reservations" class="btn btn-info text-white mb-4">Volver a Reservaciones</a>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">Seleccionar Sala</label>
            <select name="room_id" id="room_id" class="form-select" required>
                <option value="" disabled selected>-- Seleccione una sala --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Fecha y Hora de Reserva</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Reservar</button>
        </div>
    </form>
</div>
@endsection
