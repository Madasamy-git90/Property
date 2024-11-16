<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
            </div>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-3" placeholder="Search">
                <img src="{{ asset('images/user-icon.png') }}" alt="User" class="me-2" style="height: 40px;">
                <img src="{{ asset('images/logo.png') }}" alt="Admin Logo" style="height: 40px;">
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="d-flex">
        @if(Auth::guard('admin')->check())
            <nav class="bg-light p-3" style="width: 250px;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Landing Page</a>
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('banner.index') }}">Banner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sections.index') }}">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Project Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>
        @endif
        <!-- Main Content -->
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
