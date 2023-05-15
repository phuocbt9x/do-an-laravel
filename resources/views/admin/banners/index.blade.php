@extends('admin.layout.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Banners</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-sm btn-success" href="{{ route('banner.create') }}">
                                <i class="align-middle" data-feather="plus-square"></i>
                                <span class="align-middle">Create</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($banners->isNotEmpty())
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td>
                                                {{ $banner->id }}
                                            </td>
                                            <td>
                                                {{ $banner->title }}
                                            </td>
                                            <td>
                                                {{ $banner->slug }}
                                            </td>
                                            <td>
                                                {!! renderStatus($banner->status) !!}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-info mx-1"
                                                       href="{{ route('banner.show', $banner->slug) }}">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-secondary mx-1"
                                                       href="{{ route('banner.edit', $banner->slug) }}">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>

                                                    <button class="btn btn-sm btn-danger btn-delete-item"
                                                            data-url="{{ route('banner.delete', $banner->slug) }}">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th scope="row" colspan="5">
                                            Not found data.
                                        </th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <nav class="d-flex justify-items-center justify-content-between">
                                <div
                                    class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                                    <div>
                                        <p class="small text-muted">
                                            Showing
                                            <span class="fw-semibold">{{ $banners->firstItem() }}</span>
                                            to
                                            <span class="fw-semibold">{{ $banners->lastItem() }}</span>
                                            of
                                            <span class="fw-semibold">{{ $banners->total() }}</span>
                                            results
                                        </p>
                                    </div>

                                    <div>
                                        <ul class="pagination">
                                            <li class="page-item {{ $banners->previousPageUrl() ?? 'disabled' }}">
                                                <a class="page-link" href="{{ $banners->previousPageUrl() }}"
                                                   aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <span class="page-link">{{ $banners->currentPage() }}</span>
                                            </li>
                                            <li class="page-item {{ $banners->nextPageUrl() ?? 'disabled' }}">
                                                <a class="page-link" href="{{ $banners->nextPageUrl() }}"
                                                   aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
