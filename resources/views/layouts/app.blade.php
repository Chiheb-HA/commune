<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Municipality Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    @vite(['resources/js/app.js'])
    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        :root {
            --primary: #1e40af;
            --secondary: #64748b;
            --success: #16a34a;
            --danger: #dc2626;
            --warning: #f59e0b;
        }
        
        * {
            --bs-primary: var(--primary);
        }

        html,
        body {
            height: 100%;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary) !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: var(--secondary) !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .nav-link.active {
            color: var(--primary) !important;
            border-bottom: 3px solid var(--primary);
        }
        
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(15, 23, 42, 0.9) 100%), url('{{ asset('Flag-Tunisia.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 24px;
        }
        
        .btn-primary:hover {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        
        footer {
            background-color: #1e293b;
            color: #cbd5e1;
            padding: 40px 0 20px 0;
            margin-top: auto;
            flex-shrink: 0;
        }

        main {
            flex: 1 0 auto;
        }
        
        footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: white;
        }
        
        [dir="ltr"] .navbar-brand img {
            margin-right: 10px;
        }

        [dir="rtl"] .navbar-brand img {
            margin-left: 10px;
        }

        @media (max-width: 576px) {
            .navbar-brand { font-size: 1rem; }
            .hero-section { padding: 40px 0; }
            .hero-section h1 { font-size: 1.9rem; }
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <a href="#main-content" class="visually-hidden-focusable">{{ __('messages.skip_to_content') }}</a>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-xl sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('Flag-Tunisia.png') }}" alt="Tunisia Flag" style="height: 30px; margin-right: 10px;">
                <i class="bi bi-building"></i> {{ __('messages.Municipality_MajelBelAbbes') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            {{ __('messages.articles') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('articles.category', 'regulations') }}">{{ __('messages.Regulations') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">{{ __('messages.news') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}" href="{{ route('events.index') }}">{{ __('messages.events') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}" href="{{ route('galleries.index') }}">{{ __('messages.Galleries') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ __('messages.services') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('services.index') }}">{{ __('messages.municipal_services') }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('services.request') }}">{{ __('messages.submit_request') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.complaint') }}">{{ __('messages.file_complaint') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.contact') }}">{{ __('messages.contact') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ __('messages.directory_title') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('departments.index') }}">{{ __('messages.departments') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('officials.index') }}">{{ __('messages.officials') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('emergency-contacts.index') }}">{{ __('messages.emergency_contacts') }}</a></li>
                        </ul>
                    </li>
                    @auth
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu">
            @if(auth()->user()->hasRole('citizen'))
                <li><a class="dropdown-item" href="{{ route('citizen.dashboard') }}">{{ __('messages.dashboard') }}</a></li>
            @else
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">{{ __('messages.logout') }}</button>
                </form>
            </li>
        </ul>
    </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe2 me-1" aria-hidden="true"></i>{{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('setLocale', 'ar') }}" class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR</a></li>
                            <li><a href="{{ route('setLocale', 'fr') }}" class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a></li>
                            <li><a href="{{ route('setLocale', 'en') }}" class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container-lg">
            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">{{ __('messages.about') }}</h6>
                    <p class="small">{{ __('messages.about_desc') }}</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">{{ __('messages.quick_links') }}</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a></li>
                        <li><a href="{{ route('home') }}#news">{{ __('messages.news') }}</a></li>
                        <li><a href="{{ route('events.index') }}">{{ __('messages.events') }}</a></li>
                        <li><a href="{{ route('services.index') }}">{{ __('messages.services') }}</a></li>
                        <li><a href="{{ route('budget.index') }}">{{ __('messages.budget_title') }}</a></li>
                        <li><a href="{{ route('council-sessions.index') }}">{{ __('messages.council_sessions') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">{{ __('messages.directory_title') }}</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('departments.index') }}">{{ __('messages.departments') }}</a></li>
                        <li><a href="{{ route('officials.index') }}">{{ __('messages.officials') }}</a></li>
                        <li><a href="{{ route('emergency-contacts.index') }}">{{ __('messages.emergency_contacts') }}</a></li>
                        <li><a href="{{ route('services.contact') }}">{{ __('messages.contact') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">{{ __('messages.our_location') }}</h6>
                    <div id="commune-map" style="height:220px;border-radius:8px;"></div>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="small">&copy; 2026 Municipality Portal. {{ __('messages.all_rights_reserved') }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small">
                        <a href="{{ route('legal.privacy') }}">{{ __('messages.privacy_policy') }}</a> | 
                        <a href="{{ route('legal.terms') }}">{{ __('messages.terms_of_service') }}</a> | 
                        <a href="{{ route('legal.notice') }}">{{ __('messages.Legal Notice') }}</a> |
                        <a href="{{ route('sitemap.index') }}">{{ __('messages.sitemap_title') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            const mapElement = document.getElementById('commune-map');
            if (!mapElement || typeof L === 'undefined') return;

            // TODO: move to Settings model
            const communeCoordinates = [34.75, 8.5222];
            const map = L.map(mapElement, {
                scrollWheelZoom: false
            }).setView(communeCoordinates, 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker(communeCoordinates)
                .addTo(map)
                .bindPopup(@json(__('messages.Municipality_MajelBelAbbes')));
        })();
    </script>

    <!-- Confirmation Modal -->
    <x-confirmation-modal id="confirmationModal" />

    @if (session('success'))
        <div class="container-lg mt-3">
            <div class="alert alert-success alert-dismissible fade show auto-dismiss-alert" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('info'))
        <div class="container-lg mt-3">
            <div class="alert alert-info alert-dismissible fade show auto-dismiss-alert" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="container-lg mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            let currentFormToSubmit = null;
            let currentButtonToSubmit = null;

            const initConfirmationPopups = function () {
                const modal = document.getElementById('confirmationModal');
                if (!modal) return;

                const modalInstance = new bootstrap.Modal(modal);
                const confirmBtn = modal.querySelector('.confirm-action-btn');

                document.querySelectorAll('form[data-confirm]').forEach(function (form) {
                    if (form.dataset.confirmBound === 'true') {
                        return;
                    }

                    form.dataset.confirmBound = 'true';
                    form.addEventListener('submit', function (event) {
                        event.preventDefault();
                        currentFormToSubmit = form;
                        currentButtonToSubmit = null;

                        const message = form.dataset.confirm || 'Are you sure you want to proceed?';
                        const title = form.dataset.confirmTitle || 'Confirm Action';
                        const confirmText = form.dataset.confirmText || 'Confirm';
                        const cancelText = form.dataset.cancelText || 'Cancel';

                        // Update modal content
                        modal.querySelector('.modal-title').textContent = title;
                        modal.querySelector('.modal-body p').textContent = message;
                        modal.querySelector('.confirm-action-btn').textContent = confirmText;
                        modal.querySelector('.btn-light').textContent = cancelText;

                        modalInstance.show();
                    });
                });

                document.querySelectorAll('[data-confirm-submit]').forEach(function (button) {
                    if (button.dataset.confirmBound === 'true') {
                        return;
                    }

                    button.dataset.confirmBound = 'true';
                    button.addEventListener('click', function (event) {
                        const form = button.closest('form');
                        if (!form) {
                            return;
                        }

                        event.preventDefault();
                        currentFormToSubmit = form;
                        currentButtonToSubmit = button;

                        const message = button.dataset.confirmSubmit || button.dataset.confirm || 'Are you sure you want to proceed?';
                        const title = button.dataset.confirmTitle || 'Confirm Action';
                        const confirmText = button.dataset.confirmText || 'Confirm';
                        const cancelText = button.dataset.cancelText || 'Cancel';

                        // Update modal content
                        modal.querySelector('.modal-title').textContent = title;
                        modal.querySelector('.modal-body p').textContent = message;
                        modal.querySelector('.confirm-action-btn').textContent = confirmText;
                        modal.querySelector('.btn-light').textContent = cancelText;

                        modalInstance.show();
                    });
                });

                // Handle confirm button click
                confirmBtn.addEventListener('click', function () {
                    modalInstance.hide();

                    if (currentFormToSubmit) {
                        if (currentButtonToSubmit) {
                            // If it was a button click, we need to handle the form submission
                            const form = currentFormToSubmit;
                            const button = currentButtonToSubmit;
                            
                            // Create a hidden input to simulate the button click
                            const hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = button.name;
                            hiddenInput.value = button.value;
                            form.appendChild(hiddenInput);
                            
                            form.submit();
                        } else {
                            // Regular form submission
                            currentFormToSubmit.submit();
                        }
                    }

                    currentFormToSubmit = null;
                    currentButtonToSubmit = null;
                });
            };

            const initAutoDismissAlerts = function () {
                document.querySelectorAll('.auto-dismiss-alert').forEach(function (alert) {
                    if (alert.dataset.dismissTimerSet === 'true') {
                        return;
                    }

                    alert.dataset.dismissTimerSet = 'true';
                    setTimeout(function () {
                        if (window.bootstrap && typeof window.bootstrap.Alert !== 'undefined') {
                            const instance = window.bootstrap.Alert.getOrCreateInstance(alert);
                            instance.close();
                            return;
                        }

                        alert.classList.remove('show');
                        alert.classList.add('d-none');
                    }, 4000);
                });
            };

            const initializeSharedUi = function () {
                initConfirmationPopups();
                initAutoDismissAlerts();
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeSharedUi);
            } else {
                initializeSharedUi();
            }
        })();
    </script>
    @yield('extra-js')
</body>
</html>
