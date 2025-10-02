@extends('layouts.app')
@section('title', 'Detalle de Tarea')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ $task->title }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $task->description ?: 'Sin descripción' }}</p>
            <p>
                <strong>Estado:</strong>
                @if($task->is_completed)
                    <span class="badge bg-success">Completada</span>
                @else
                    <span class="badge bg-warning text-dark">Pendiente</span>
                @endif
            </p>
            <p><strong>Creada:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Actualizada:</strong> {{ $task->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection