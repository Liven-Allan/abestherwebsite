@extends('layouts.app')

@section('title', 'Manage Contact Information')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid py-5 page-header position-relative mb-5"
     style="background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ $headerBackgroundImage }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container py-5 text-center">
        <h1 class="display-2 text-white animated slideInDown mb-4">Contact Information Management</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact Info</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Contact Information Management</h5>
                    <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Contact Info
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @foreach(['address', 'phone', 'email'] as $type)
                        @if(isset($contactInfos[$type]) && $contactInfos[$type]->count() > 0)
                            <div class="mb-4">
                                <h6 class="text-uppercase text-muted mb-3">
                                    <i class="fas {{ $contactInfos[$type]->first()->icon }} me-2"></i>
                                    {{ ucfirst($type) }} Information
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Label</th>
                                                <th>Value</th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contactInfos[$type] as $contact)
                                                <tr>
                                                    <td>{{ $contact->display_label }}</td>
                                                    <td>{{ $contact->value }}</td>
                                                    <td>{{ $contact->sort_order }}</td>
                                                    <td>
                                                        @if($contact->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-secondary">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('admin.contact-info.edit', $contact) }}" 
                                                               class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('admin.contact-info.destroy', $contact) }}" 
                                                                  method="POST" 
                                                                  class="d-inline"
                                                                  onsubmit="return confirm('Are you sure you want to delete this contact information?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if($contactInfos->isEmpty())
                        <div class="text-center py-4">
                            <i class="fas fa-address-book fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No contact information found.</p>
                            <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary">
                                Add First Contact Info
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('admin') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection