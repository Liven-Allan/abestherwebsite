@extends('layouts.app')

@section('title', 'Manage Photo Gallery')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Photo Gallery Management</h5>
                    <a href="{{ route('admin.photo-gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Photo
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($photos->count() > 0)
                        <div class="row g-4">
                            @foreach($photos as $photo)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card h-100">
                                        <img src="{{ $photo->image_url }}" 
                                             class="card-img-top" 
                                             alt="{{ $photo->title }}"
                                             style="height: 200px; object-fit: cover;">
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title">{{ $photo->title }}</h6>
                                            <p class="card-text flex-grow-1">
                                                <small class="text-muted">{{ $photo->short_description }}</small>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">Order: {{ $photo->sort_order }}</small>
                                                @if($photo->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group w-100" role="group">
                                                <a href="{{ route('admin.photo-gallery.edit', $photo) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.photo-gallery.destroy', $photo) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this photo?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($photos->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $photos->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-images fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No photos in gallery.</p>
                            <a href="{{ route('admin.photo-gallery.create') }}" class="btn btn-primary">
                                Add First Photo
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection