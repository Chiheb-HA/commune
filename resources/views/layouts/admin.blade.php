<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ __('messages.Admin Dashboard') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('building.png') }}">
    @if(app()->getLocale() === 'ar')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #1e40af;
            --secondary: #64748b;
            --sidebar-bg: #1e293b;
            --sidebar-text: #cbd5e1;
        }
        
        * {
            --bs-primary: var(--primary);
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
            display: flex;
        }
        
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            overflow-y: auto;
            max-height: 100vh;
            -webkit-overflow-scrolling: touch;
        }
        
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        [dir="rtl"] .sidebar {
            left: auto;
            right: 0;
        }
        
        .sidebar .brand {
            padding: 0 20px 30px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        [dir="rtl"] .sidebar .brand {
            text-align: right;
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-nav li {
            margin: 5px 0;
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(30, 64, 175, 0.2);
            color: white;
            border-left: 4px solid var(--primary);
            padding-left: 16px;
        }
        
        [dir="rtl"] .sidebar-nav a:hover,
        [dir="rtl"] .sidebar-nav a.active {
            border-left: none;
            border-right: 4px solid var(--primary);
            padding-left: 12px;
            padding-right: 16px;
        }
        
        .sidebar-nav i {
            width: 20px;
            text-align: center;
        }
        
        [dir="rtl"] .sidebar-nav i {
            text-align: center;
        }
        
        .sidebar-nav .btn-group {
            width: 100%;
        }
        
        .sidebar-nav .btn-group .btn {
            flex: 1;
            font-size: 0.75rem;
            padding: 4px 8px;
            border-color: rgba(255, 255, 255, 0.2);
            color: var(--sidebar-text);
            background-color: transparent;
        }
        
        .sidebar-nav .btn-group .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .sidebar-nav .btn-group .btn.active {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        
        .sidebar-nav .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            border-color: rgba(255, 255, 255, 0.2);
            color: var(--sidebar-text);
            background-color: transparent;
        }
        
        .sidebar-nav .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .sidebar .brand h5 {
            color: white;
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-nav li {
            margin: 5px 0;
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: rgba(30, 64, 175, 0.2);
            color: white;
            border-left: 4px solid var(--primary);
            padding-left: 16px;
        }
        
        [dir="rtl"] .sidebar-nav a:hover,
        [dir="rtl"] .sidebar-nav a.active {
            border-left: none;
            border-right: 4px solid var(--primary);
            padding-left: 12px;
            padding-right: 16px;
        }
        
        .sidebar-nav i {
            width: 20px;
            text-align: center;
        }
        
        [dir="rtl"] .sidebar-nav i {
            text-align: center;
        }
        
        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        [dir="rtl"] .main-content {
            margin-left: 0;
            margin-right: 280px;
        }
        
        .top-navbar {
            background-color: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        [dir="rtl"] .top-navbar {
            flex-direction: row-reverse;
        }
        
        .top-navbar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .content-area {
            flex: 1;
            padding: 30px;
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin: 0;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        
        .table {
            background-color: white;
        }
        
        .table thead th {
            background-color: #f1f5f9;
            border-top: 1px solid #e2e8f0;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                overflow: hidden;
                transition: width 0.3s ease;
            }
            
            [dir="rtl"] .sidebar {
                left: 0;
                right: auto;
            }
            
            .sidebar.active {
                width: 280px;
            }
            
            [dir="rtl"] .sidebar.active {
                right: 0;
                left: auto;
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            [dir="rtl"] .main-content {
                margin-right: 0;
            }
            
            .toggle-sidebar {
                display: block;
            }
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <h5><i class="bi bi-speedometer2"></i> {{ __('messages.Admin Panel') }}</h5>
            <small>{{ __('messages.Municipality Portal') }}</small>
        </div>

        <ul class="sidebar-nav">
            <!-- Quick Actions -->
            <li class="mt-3 mb-2 px-3"><small class="text-uppercase fw-bold">{{ __('messages.Quick Actions') }}</small></li>
            
            <!-- Language Switcher -->
            <li class="px-3 mb-3">
                <div class="btn-group w-100" role="group">
                    <a href="{{ route('setLocale', 'fr') }}" class="btn btn-sm btn-outline-secondary {{ app()->getLocale() === 'fr' ? 'active' : '' }}" title="Français">
                        FR
                    </a>
                    <a href="{{ route('setLocale', 'en') }}" class="btn btn-sm btn-outline-secondary {{ app()->getLocale() === 'en' ? 'active' : '' }}" title="English">
                        EN
                    </a>
                    <a href="{{ route('setLocale', 'ar') }}" class="btn btn-sm btn-outline-secondary {{ app()->getLocale() === 'ar' ? 'active' : '' }}" title="العربية">
                        AR
                    </a>
                </div>
            </li>
            
            <li class="px-3 mb-3">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary w-100" title="{{ __('messages.Visit Website') }}">
                    <i class="bi bi-globe"></i> {{ __('messages.Visit Website') }}
                </a>
            </li>
            
            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.Navigation') }}</small></li>
            
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i> <span>{{ __('messages.Dashboard') }}</span>
            </a></li>

            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.Content') }}</small></li>
            <li><a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <i class="bi bi-file-text"></i> <span>{{ __('messages.Articles') }}</span>
            </a></li>
            <li><a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> <span>{{ __('messages.News') }}</span>
            </a></li>
            <li><a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i> <span>{{ __('messages.Events') }}</span>
            </a></li>
            <li><a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <i class="bi bi-image"></i> <span>{{ __('messages.Galleries') }}</span>
            </a></li>

            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.Services') }}</small></li>
            <li><a href="{{ route('admin.requests.index') }}" class="nav-link {{ request()->routeIs('admin.requests.*') ? 'active' : '' }}">
                <i class="bi bi-inbox"></i> <span>{{ __('messages.Requests') }}</span>
            </a></li>
            <li><a href="{{ route('admin.complaints.index') }}" class="nav-link {{ request()->routeIs('admin.complaints.*') ? 'active' : '' }}">
                <i class="bi bi-exclamation-circle"></i> <span>{{ __('messages.Complaints') }}</span>
            </a></li>

            @if(Route::has('admin.departments.index'))
            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.Directory') }}</small></li>
            <li><a href="{{ route('admin.departments.index') }}" class="nav-link">
                <i class="bi bi-building"></i> <span>{{ __('messages.Departments') }}</span>
            </a></li>
            @endif
            @if(Route::has('admin.officials.index'))
            <li><a href="{{ route('admin.officials.index') }}" class="nav-link">
                <i class="bi bi-person-badge"></i> <span>{{ __('messages.Officials') }}</span>
            </a></li>
            @endif

            @if(Route::has('admin.users.index') || Route::has('users.index'))
            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.System') }}</small></li>
            @endif
            @if(Route::has('admin.users.index'))
            <li><a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="bi bi-people"></i> <span>{{ __('messages.Users') }}</span>
            </a></li>
            @elseif(Route::has('users.index'))
            <li><a href="{{ route('users.index') }}" class="nav-link">
                <i class="bi bi-people"></i> <span>{{ __('messages.Users') }}</span>
            </a></li>
            @endif
            @if(Route::has('admin.permissions.index'))
            <li><a href="{{ route('admin.permissions.index') }}" class="nav-link">
                <i class="bi bi-shield-lock"></i> <span>{{ __('messages.Permissions') }}</span>
            </a></li>
            @endif
            @if(Route::has('admin.audit.index'))
            <li><a href="{{ route('admin.audit.index') }}" class="nav-link">
                <i class="bi bi-clock-history"></i> <span>{{ __('messages.Audit Log') }}</span>
            </a></li>
            @endif

            <li class="mt-4 px-3"><small class="text-uppercase fw-bold">{{ __('messages.System') }}</small></li>
            <li><a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> <span>{{ __('messages.Settings') }}</span>
            </a></li>
            <li><a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person"></i> <span>{{ __('messages.Profile') }}</span>
            </a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary toggle-sidebar d-md-none">
                    <i class="bi bi-list"></i>
                </button>
                <h6 class="mb-0">@yield('page-title', 'Dashboard')</h6>
            </div>
            
            <div class="user-info">
                <span class="text-muted">{{ auth()->user()->name ?? 'Admin' }}</span>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('messages.Profile') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.settings') }}">{{ __('messages.Settings') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('messages.logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Page Content -->
        <div class="content-area">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ __('Errors') }}:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.toggle-sidebar')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
    @yield('extra-js')
</body>
</html>
