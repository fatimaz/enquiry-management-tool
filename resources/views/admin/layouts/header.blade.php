<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active-link' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('enquiries.index') || request()->routeIs('enquiries.show') || request()->routeIs('enquiries.edit') ? 'active-link' : '' }}"
                            href="{{ route('enquiries.index') }}">
                            Enquiries
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn {{ request()->routeIs('enquiries.create') ? 'btn-primary' : 'btn-outline-primary' }} ms-lg-3"
                            href="{{ route('enquiries.create') }}">
                            Submit Enquiry
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
