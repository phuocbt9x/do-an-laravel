@extends('admin.layout.main')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Categories</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-sm btn-success" href="{{ route('category.create') }}">
                                <i class="align-middle" data-feather="plus-square"></i>
                                <span class="align-middle">Create</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action(s)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{ $category->id }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td>
                                                {{ $category->slug }}
                                            </td>
                                            <td>
                                                {!! renderStatus($category->status) !!}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-sm btn-secondary mx-1"
                                                       href="{{ route('category.edit', $category->slug) }}">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>

                                                    <button class="btn btn-sm btn-danger btn-delete-item"
                                                            data-url="{{ route('category.delete', $category->slug) }}">
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
                                            <span class="fw-semibold">{{ $categories->firstItem() }}</span>
                                            to
                                            <span class="fw-semibold">{{ $categories->lastItem() }}</span>
                                            of
                                            <span class="fw-semibold">{{ $categories->total() }}</span>
                                            results
                                        </p>
                                    </div>

                                    <div>
                                        <ul class="pagination">
                                            <li class="page-item {{ $categories->previousPageUrl() ?? 'disabled' }}">
                                                <a class="page-link" href="{{ $categories->previousPageUrl() }}"
                                                   aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <span class="page-link">{{ $categories->currentPage() }}</span>
                                            </li>
                                            <li class="page-item {{ $categories->nextPageUrl() ?? 'disabled' }}">
                                                <a class="page-link" href="{{ $categories->nextPageUrl() }}"
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
