@extends('layouts.app')

@section('title', 'Upload File')

@section('content')
<div class="container">
    <h2 class="mb-4 shadow-sm p-3 rounded bg-white">Upload File</h2>

    <div class="card border-0 shadow-sm m-auto" style="max-width: 600px; animation: fadeInUp 0.5s ease;">
        <div class="card-body">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-medium">File Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label fw-medium">Choose File</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    @error('file')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label fw-medium">File Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="" selected disabled>Select Type</option>
                        <option value="project">Project</option>
                        <option value="docs">Docs</option>
                        <option value="txt">Text</option>
                        <option value="code">Code</option>
                        <option value="image">Image</option>
                    </select>
                    @error('type')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-upload me-1"></i> Upload File
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
