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
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
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
            margin-top: 80px;
        }
        
        footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: white;
        }
        
        .language-selector {
            display: flex;
            gap: 8px;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 1px solid #e2e8f0;
        }
        
        [dir="rtl"] .language-selector {
            margin-left: 0;
            margin-right: 20px;
            padding-left: 0;
            padding-right: 20px;
            border-left: none;
            border-right: 1px solid #e2e8f0;
        }
        
        .lang-btn {
            background: none;
            border: 1px solid var(--secondary);
            color: var(--secondary);
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .lang-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .lang-btn:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        [dir="ltr"] .navbar-brand img {
            margin-right: 10px;
        }

        [dir="rtl"] .navbar-brand img {
            margin-left: 10px;
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('Flag-Tunisia.png') }}" alt="Tunisia Flag" style="height: 30px; margin-right: 10px;">
                <i class="bi bi-building"></i> بوابة البلدية
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a>
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
                            <li><a class="dropdown-item" href="{{ route('services.request') }}">{{ __('messages.submit_request') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.complaint') }}">{{ __('messages.file_complaint') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.contact') }}">{{ __('messages.contact') }}</a></li>
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
                    <li class="nav-item">
                        <div class="language-selector">
                            <a href="{{ route('setLocale', 'fr') }}" class="lang-btn {{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                            <a href="{{ route('setLocale', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                            <a href="{{ route('setLocale', 'ar') }}" class="lang-btn {{ app()->getLocale() === 'ar' ? 'active' : '' }}">AR</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
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
                        <li><a href="#services">{{ __('messages.services') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white mb-3">{{ __('messages.directory_title') }}</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#departments">{{ __('messages.departments') }}</a></li>
                        <li><a href="#officials">{{ __('messages.officials') }}</a></li>
                        <li><a href="#contact">{{ __('messages.contact') }}</a></li>
                    </ul>
                </div>
                
            </div>
            <hr class="bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="small">&copy; 2024 Municipality Portal. {{ __('messages.all_rights_reserved') }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small">
                        <a href="#">{{ __('messages.privacy_policy') }}</a> | 
                        <a href="#">{{ __('messages.terms_of_service') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

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
