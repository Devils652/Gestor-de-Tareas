@extends('layouts.app')
@section('title', 'Crear Nueva Tarea')

@section('content')
    <h1>Crear Nueva Tarea</h1>
    
    @include('tasks._form', [
        'action' => route('tasks.store'),
        'submitText' => 'Crear Tarea'
    ])
@endsection