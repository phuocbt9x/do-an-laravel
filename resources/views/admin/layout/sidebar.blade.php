<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Admin Page</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Navigation
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('category.index') }}">
                    <i class="align-middle" data-feather="align-left"></i>
                    <span class="align-middle">Categories</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="log-out"></i>
                    <span class="align-middle">Log out</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
