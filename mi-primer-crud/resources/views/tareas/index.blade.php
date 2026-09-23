@extends('layouts.app')
@section('title', 'Listado de Tareas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
<h1>Listado de Tareas</h1>
<a href="{{ route('tareas.create') }}" class="btn btn-success">
+ Nueva Tarea
</a>
</div>
@if($tareas->isEmpty())
<div class="alert alert-info">No hay tareas registradas.</div>
@else
<table class="table table-striped table-hover bg-white">
<thead class="table-dark">
<tr>
<th>#</th>
<th>Título</th>
<th>Fecha límite</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($tareas as $tarea)
<tr>
<td>{{ $tarea->id }}</td>
<td>{{ $tarea->titulo }}</td>
<td>{{ $tarea->fecha_limite?->format('d/m/Y') ?? '—' }}</td>
<td>
@if($tarea->completada)
<span class="badge bg-success">Completada</span>
@else
<span class="badge bg-warning text
dark">Pendiente</span>
@endif
</td>
<td>
<a href="{{ route('tareas.show', $tarea) }}"
class="btn btn-sm btn-info">Ver</a>
<a href="{{ route('tareas.edit', $tarea) }}"
class="btn btn-sm btn-primary">Editar</a>
<form action="{{ route('tareas.destroy', $tarea) }}"
method="POST" class="d-inline"
onsubmit="return confirm('¿Eliminar esta tarea?');">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">
Eliminar
</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endif
@endsection