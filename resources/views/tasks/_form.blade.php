<form action="{{ $action }}" method="POST">
    @csrf
    @if(isset($method))
        @method($method)
    @endif
    
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" 
               class="form-control @error('title') is-invalid @enderror" 
               value="{{ old('title', $task->title ?? '') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" id="description" rows="4" 
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    @if(isset($task))
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_completed" id="is_completed" 
               class="form-check-input" value="1" 
               @checked(old('is_completed', $task->is_completed ?? false))>
        <label for="is_completed" class="form-check-label">
            Marcar como Completada
        </label>
    </div>
    @endif
    
    <button type="submit" class="btn btn-primary">{{ $submitText ?? 'Guardar' }}</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancelar</a>
</form>