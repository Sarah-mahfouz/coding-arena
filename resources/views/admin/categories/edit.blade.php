@extends('layouts.admin')
@section('main')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
    <h1>Edit Category: {{ $category->name }}</h1>

    {{-- The route('categories.update', $category->id) uses the resource route for updating. --}}
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT') {{-- or @method('PATCH') --}}

    <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $category->name) }}"
                required
            >
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
            <input
                type="text"
                name="slug"
                id="slug"
                class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $category->slug) }}"
                required
            >
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="form-control @error('description') is-invalid @enderror"
                required
            >{{ old('description', $category->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image (URL) -->
        <div class="mb-3">
            <label for="image" class="form-label">Image URL <span class="text-secondary">(Optional)</span></label>
            <input
                type="text"
                name="image"
                id="image"
                class="form-control @error('image') is-invalid @enderror"
                value="{{ old('image', $category->image) }}"
            >
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Created By (User ID) -->
        <div class="mb-3">
            <label for="created_by" class="form-label">Created By (User ID)</label>
            <input
                type="text"
                name="created_by"
                id="created_by"
                class="form-control @error('created_by') is-invalid @enderror"
                value="{{ old('created_by', $category->created_by) }}"
            >
            @error('created_by')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
            </div>
        </div>
    </main>
@endsection
