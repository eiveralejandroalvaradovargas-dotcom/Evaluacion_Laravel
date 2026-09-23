@extends('layouts.app')
@section('title', 'Editar Tarea')
@section('content')
<h1 class="mb-4">Editar Tarea</h1>
<div class="card">
<div class="card-body">
<form action="{{ route('tareas.update', $tarea) }}" method="POST">
@csrf
@method('PUT')
<div class="mb-3">
<label class="form-label">Título *</label>
<input type="text" name="titulo"
class="form-control @error('titulo') is-invalid @enderror"
value="{{ old('titulo', $tarea->titulo) }}" required>
@error('titulo')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label class="form-label">Descripción</label>
<textarea name="descripcion" rows="3" class="form-control">{{ 
old('descripcion', $tarea->descripcion) }}</textarea>
</div>
<div class="mb-3">
<label class="form-label">Fecha límite</label>
<input type="date" name="fecha_limite"
class="form-control"
value="{{ old('fecha_limite', $tarea->fecha_limite?
>format('Y-m-d')) }}">
</div>
<div class="form-check mb-3">
<input type="checkbox" name="completada" value="1"
class="form-check-input" id="completada"
{{ old('completada', $tarea->completada) ? 'checked' : '' }}>
<label class="form-check-label" for="completada">Completada</label>
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>
<a href="{{ route('tareas.index') }}" class="btn btn
secondary">Cancelar</a>
</form>
</div>
</div>
@endsection