<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $technology->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="4" required>{{ old('description', $technology->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Pulsante per creare o aggiornare --}}
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
<a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Cancel</a>
