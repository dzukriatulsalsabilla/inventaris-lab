<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventaris Lab RPL') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-width: 260px;
        }
        
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        
        /* Sidebar Desktop */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link i {
            font-size: 1.2rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        /* Navbar */
        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        /* Cards */
        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        
        .stat-card .card-body {
            padding: 1.5rem;
        }
        
        .bg-gradient-primary { background: var(--primary-gradient); color: white; }
        .bg-gradient-success { background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%); color: white; }
        .bg-gradient-danger { background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%); color: white; }
        .bg-gradient-info { background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%); color: white; }
        
        /* Table Responsive */
        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Mobile Toggle */
        .sidebar-toggle {
            display: none;
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 1.2rem;
        }
        
        /* Overlay untuk mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        
        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .sidebar-overlay.show {
                display: block;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: inline-block;
            }
        }
        
        @media (max-width: 576px) {
            .stat-card .card-body {
                padding: 1rem;
            }
            
            .stat-card h2 {
                font-size: 1.5rem;
            }
            
            .btn-group-sm .btn {
                padding: 0.25rem 0.4rem;
                font-size: 0.75rem;
            }
        }
        
        /* Print Styles */
        @media print {
            .sidebar, .top-navbar, .no-print { display: none !important; }
            .main-content { margin-left: 0; }
            body { background: white; }
        }
    </style>
</head>
<body>
    @auth
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-white border-opacity-25">
            <i class="bi bi-box-seam fs-2 me-2"></i>
            <div>
                <h5 class="mb-0 fw-bold">Inventaris Lab</h5>
                <small class="opacity-75">RPL</small>
            </div>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('barangs.*') ? 'active' : '' }}" href="{{ route('barangs.index') }}">
                    <i class="bi bi-box"></i>
                    <span>Data Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}" href="{{ route('laporan.index') }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>
        
        <div class="mt-auto pt-4 border-top border-white border-opacity-25">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="ms-2 flex-grow-1 overflow-hidden">
                    <div class="text-truncate fw-semibold">{{ Auth::user()->name }}</div>
                    <small class="opacity-75 text-truncate d-block">{{ Auth::user()->email }}</small>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 text-start">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
    @endauth

    <!-- Main Content -->
    <main class="main-content">
        @auth
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <h6 class="mb-0 fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h6>
                    <small class="text-muted">{{ now()->format('l, d F Y') }}</small>
                </div>
            </div>
            <div class="d-none d-md-block">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                    <i class="bi bi-shield-check me-1"></i> Petugas Lab
                </span>
            </div>
        </div>
        @endauth

        <div class="p-3 p-md-4">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar Mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });
            
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>