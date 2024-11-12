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
    <h1>Editar Sala</h1>
    <a href="/rooms" class="btn btn-info text-white mb-4">Volver a Salas</a>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row g-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nombre de la Sala</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $room->name) }}" required>
                </div>
            </div>
     
            <div class="col-12">

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $room->description) }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-4 float-end">Actualizar sala</button>
            </div>
        </div>
    </form>
</div>
@endsection
