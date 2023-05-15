@extends('admin.layout.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Banner Form</h1>
            </div>
            <form action="{{ isset($banner) ? route('banner.update', $banner?->slug) : route('banner.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($banner))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="title" class="mb-1">Title</label>
                                    <input value="{{ $banner?->title ?? old('title') }}" type="text" class="form-control" name="title"
                                           id="title" placeholder="Enter name">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="title" class="mb-1">Position</label>
                                    <select class="form-select mb-3" name="position">
                                        <option value="">Choose option position</option>
                                        @foreach($positions as $key => $item)
                                            <option @selected(($banner?->position ?? old('position')) === $key) value="{{ $key }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="time_start" class="mb-1">Time start</label>
                                    <input value="{{ $banner?->time_start ?? old('time_start')  }}" type="datetime-local" class="form-control" name="time_start"
                                           id="time_start" placeholder="Enter time start">
                                    @error('time_start')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="time_end" class="mb-1">Time end</label>
                                    <input value="{{ $banner?->time_end ?? old('time_end')  }}" type="datetime-local" class="form-control" name="time_end"
                                           id="time_end" placeholder="Enter time end">
                                    @error('time_end')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input
                                        {{ isset($banner) && $banner?->status === 1 ? 'checked' : '' }}
                                        class="form-check-input"
                                        type="checkbox" value="1" name="status" id="status">
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                                <div class="form-group mb-3 d-flex justify-content-between">
                                    <a href="{{ route('banner.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3"
                                     style="display: flex; flex-direction: column; align-items: center">
                                    <input type="file" class="form-control btn-upload-image" name="image" id="image">
                                    <img
                                        src="{{ isset($banner) ? $banner?->fullPathImage : asset('assets/uploads/default-image.png')  }}"
                                        style="object-fit: cover; width: 100%; height: 200px; border: solid 1px"
                                        alt="Banner image" class="mt-2 preview-image">
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ckEditor" class="mb-1">Content</label>
                                    <textarea id="ckEditor" class="form-control" rows="2" name="content"
                                              placeholder="Content">{!! htmlspecialchars_decode($banner?->content ?? '') !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
