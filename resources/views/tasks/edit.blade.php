@extends('layouts.app')
@section('title', 'Editar Tarea')

@section('content')
    <h1>Editar Tarea</h1>
    
    @include('tasks._form', [
        'action' => route('tasks.update', $task),
        'method' => 'PUT',
        'task' => $task,
        'submitText' => 'Actualizar Tarea'
    ])
@endsection