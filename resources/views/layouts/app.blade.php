<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        
        <!-- Custom CSS -->
        <style>
            :root {
                --light-blue: #e3f2fd;
                --navbar-blue: #bbdefb;
            }
            
            .bg-light-blue {
                background-color: var(--light-blue) !important;
            }
            
            .navbar-custom {
                background-color: var(--navbar-blue) !important;
            }
            
            .sidebar {
                min-height: 100vh;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            .nav-link {
            color: #000000 !important;
        }

        .nav-link.active {
            color: #000000 !important;
            background-color: var(--light-blue) !important;
        }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar bg-white p-3" style="width: 250px;">
                <div class="d-flex align-items-center mb-4 p-2">
                    <x-application-logo class="block h-9 w-auto" />
                    <h4 class="ms-2 mb-0">SPP Laravel</h4>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users') ? 'active' : '' }}" href="{{ route('users') }}">
                            <i class="bi bi-people-fill"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kompetensi') ? 'active' : '' }}" href="{{ route('kompetensi') }}">
                            <i class="bi bi-amd"></i> Kompetensi
                        </a>
                    </li>
                    
                </ul>
            </div>

            <!-- Main Content -->
            <div class="flex-grow-1 bg-light-blue">
                <!-- Top Navbar -->
                <nav class="navbar navbar-expand-lg navbar-custom">
                    <div class="container-fluid">
                        <div class="ms-auto">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-1 m-1 border border-dark rounded-2">
                                    <li >
                                        <a class=" dropdown-item" href="{{ route('profile.edit') }}">
                                           Profile
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Content Area -->
                <div class="container-fluid p-4">
                    @isset($header)
                        <h4 class="mb-4">{{ $header }}</h4>
                    @endisset

                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>