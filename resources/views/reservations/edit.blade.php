@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>
    <form action="{{ route('rooms.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="room_id">Seleccionar Sala</label>
            <select name="room_id" id="room_id" class="form-control">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_time">Fecha y Hora de Reserva</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Editar sala</button>
    </form>
</div>
@endsection