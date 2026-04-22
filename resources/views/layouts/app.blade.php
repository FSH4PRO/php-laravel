<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIU Store Management - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            background: #1a1d20;
            color: white;
            padding-top: 20px;
            z-index: 1001;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 0 25px 30px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            transition: 0.2s;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover {
            background: #2b3035;
            color: white;
        }

        .sidebar a.active {
            background: #2b3035;
            color: white;
            border-left: 4px solid #0d6efd;
            font-weight: 600;
        }

        /* Navbar & Content Layout */
        .page-container {
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #dee2e6;
            padding: 15px 30px;
        }

        .main-content {
            padding: 30px;
            min-height: calc(100vh - 73px);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .page-container {
                margin-left: 0;
            }

            .navbar {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4 class="fw-bold text-primary mb-0">STORE_DB</h4>
        </div>
        <div class="nav flex-column">
            <a href="{{ route('products.index') }}" class="{{ Request::is('products*') ? 'active' : '' }}">
                <span>📦 Products</span>
            </a>
            <a href="#" class="{{ Request::is('stores*') ? 'active' : '' }}">
                <span>🏠 Stores</span>
            </a>
            <a href="#" class="{{ Request::is('warehouses*') ? 'active' : '' }}">
                <span>🏭 Warehouses</span>
            </a>
            <a href="#" class="{{ Request::is('employees*') ? 'active' : '' }}">
                <span>👥 Employees</span>
            </a>
        </div>
    </div>

    <div class="page-container">
        <nav class="navbar sticky-top navbar-light bg-white">
            <div class="container-fluid">
                <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
                    ☰
                </button>
                <span class="navbar-brand mb-0 h1 ms-2">@yield('title', 'Dashboard')</span>

                <div class="ms-auto d-flex align-items-center">
                    <span
                        class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill">
                        Role: {{ session('user_role', 'Admin') }}
                    </span>
                </div>
            </div>
        </nav>

        <main class="main-content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
