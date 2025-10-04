<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Gaji DPR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; flex-direction: column; }
        .main-container { flex: 1; display: flex; }
        .sidebar { width: 250px; background-color: #343a40; }
        .content { flex-grow: 1; padding: 2rem; }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar text-white p-3">
            <h4>Admin Menu</h4>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.anggota.index') }}" class="nav-link text-white {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
                        Manajemen Anggota
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        Komponen Gaji
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        Penggajian
                    </a>
                </li>
            </ul>
            <hr>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
        <div class="content bg-light">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>