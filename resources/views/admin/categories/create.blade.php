@extends('layouts.admin')
@section('main')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <h1 class="font-weight-bolder text-white mb-0">Categories</h1>
                <div class="col3">
                    <h1 class="mb-4">Create Category Form</h1>

                    <form action="{{route('categories.store') }}" method="POST">
                    @csrf
                    <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="Enter Category Name"
                                required
                            >
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control @error('slug') is-invalid @enderror"
                                name="slug"
                                id="slug"
                                value="{{ old('slug') }}"
                                placeholder="Enter Category Slug"
                                required
                            >
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea
                                name="description"
                                id="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="4"
                                placeholder="Enter Category Description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL<span class="text-secondary">(Optional)</span></label>
                            <input
                                type="text"
                                class="form-control @error('image') is-invalid @enderror"
                                name="image"
                                id="image"
                            >
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Created By (Optional) -->
                        <div class="mb-3">
                            <label for="created_by" class="form-label">Created By</label>
                            <input
                                type="text"
                                class="form-control @error('created_by') is-invalid @enderror"
                                name="created_by"
                                id="created_by"
                                value="{{ old('created_by', Auth::id()) }}"
                            >
                            @error('created_by')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            Create Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
