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
    <h1 class="mb-4">Crear Sala</h1>
    <a href="/rooms" class="btn btn-info text-white mb-4">Volver a Salas</a>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nombre Sala</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descripción (opcional)</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary ms-3">Crear Sala</button>
            </div>
        </div>
    </form>
</div>
@endsection
