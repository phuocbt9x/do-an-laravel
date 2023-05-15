@extends('admin.layout.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Detail Banner</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-5">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="h3 text-black">
                                {{ htmlspecialchars_decode($banner->title) }}
                            </h3>
                            <div class="mx-2 mt-1">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <strong class="feather-sm me-1"> Slug: </strong>
                                        <span class="text-info">
                                            {{ $banner?->slug }}
                                        </span>
                                    </li>

                                    <li class="mb-1">
                                        <strong class="feather-sm me-1"> Time start: </strong>
                                        <span class="text-info">
                                            {{ formatDateTime($banner?->time_start) }}
                                        </span>
                                    </li>

                                    <li class="mb-1">
                                        <strong class="feather-sm me-1"> Time end: </strong>
                                        <span class="text-info">
                                            {{ formatDateTime($banner?->time_end) }}
                                        </span>
                                    </li>

                                    <li class="mb-1">
                                        <strong class="feather-sm me-1"> Position: </strong>
                                        <span class="text-info">
                                            {{ $banner?->positionBanner }}
                                        </span>
                                    </li>

                                    <li class="mb-1">
                                        <strong class="feather-sm me-1"> Status: </strong>
                                        {!! renderStatus($banner?->status) !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('banner.index') }}" class="btn btn-lg btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image</h5>
                            <div style="width: 100%; height: 250px">
                                <img style="width: 100%; height: 100%; object-fit: cover"
                                     class="rounded mx-auto d-block" src="{{ $banner->fullPathImage }}">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Content</h5>
                            <div>
                                {!! htmlspecialchars_decode($banner->content) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
