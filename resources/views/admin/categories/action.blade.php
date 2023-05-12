@extends('admin.layout.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Form Category</h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form
                                action="{{ isset($category) ? route('category.update', $category->slug) : route('category.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($category))
                                    @method('PUT')
                                @endif
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-1">Name Category</label>
                                    <input value="{{ $category?->name ?? '' }}" type="text" class="form-control" name="name"
                                           id="name" placeholder="Enter name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input
                                        {{ isset($category) && $category->status === 1 ? 'checked' : '' }} class="form-check-input"
                                        type="checkbox" value="1" name="status" id="status">
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                                <div class="form-group mb-3 d-flex justify-content-between">
                                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
