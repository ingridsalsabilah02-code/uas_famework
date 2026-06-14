<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penduduk Desa - @yield('title')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background: #f4f6f9; }
        .sidebar {
            position: fixed; top: 0; left: 0; width: 250px; height: 100vh;
            background: linear-gradient(180deg, #1a237e 0%, #283593 100%);
            color: white; padding: 20px 0; overflow-y: auto;
        }
        .sidebar h2 { text-align: center; padding: 15px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .sidebar a {
            display: block; color: rgba(255,255,255,0.8); text-decoration: none;
            padding: 12px 25px; transition: all 0.3s; font-size: 14px;
        }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 4px solid #64b5f6; }
        .sidebar .menu-label { padding: 10px 25px; font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 15px; }
        .main { margin-left: 250px; padding: 20px; }
        .topbar {
            background: white; padding: 15px 25px; border-radius: 8px;
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .topbar h3 { color: #333; }
        .logout-btn {
            background: #e53935; color: white; border: none; padding: 8px 16px;
            border-radius: 5px; cursor: pointer; font-size: 13px;
        }
        .logout-btn:hover { background: #c62828; }
        .card {
            background: white; border-radius: 10px; padding: 25px;
            margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .card h3 { margin-bottom: 20px; color: #1a237e; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 25px; }
        .stat-card {
            background: white; border-radius: 10px; padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center;
            border-top: 4px solid #1a237e;
        }
        .stat-card.blue { border-top-color: #1976d2; }
        .stat-card.green { border-top-color: #388e3c; }
        .stat-card.orange { border-top-color: #f57c00; }
        .stat-card.purple { border-top-color: #7b1fa2; }
        .stat-card h4 { color: #666; font-size: 13px; margin-bottom: 8px; }
        .stat-card .number { font-size: 32px; font-weight: bold; color: #1a237e; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        table th { background: #1a237e; color: white; font-weight: 600; }
        table tr:hover { background: #f5f5f5; }
        .btn {
            display: inline-block; padding: 7px 14px; border-radius: 5px;
            text-decoration: none; font-size: 13px; border: none; cursor: pointer;
        }
        .btn-primary { background: #1976d2; color: white; }
        .btn-success { background: #388e3c; color: white; }
        .btn-warning { background: #f57c00; color: white; }
        .btn-danger { background: #d32f2f; color: white; }
        .btn-info { background: #0288d1; color: white; }
        .btn:hover { opacity: 0.85; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: #333; font-size: 14px; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 10px 12px; border: 1px solid #ddd;
            border-radius: 5px; font-size: 14px;
        }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #1976d2; }
        .alert { padding: 12px 15px; border-radius: 5px; margin-bottom: 20px; font-size: 14px; }
        .alert-success { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
        .alert-danger { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }
        .badge { padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .badge-success { background: #e8f5e9; color: #2e7d32; }
        .badge-warning { background: #fff3e0; color: #e65100; }
        .badge-danger { background: #ffebee; color: #c62828; }
        .action-buttons form { display: inline; }

.dashboard-header{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    color:white;
    padding:30px;
    border-radius:20px;
    margin-bottom:25px;
}

.dashboard-header h1{
    margin-bottom:10px;
    font-size:28px;
}

.dashboard-header p{
    opacity:.9;
}

.dashboard-cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:25px;
}

.info-card{
    background:white;
    border-radius:16px;
    padding:25px;
    display:flex;
    align-items:center;
    gap:15px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    border-left:5px solid #1e3c72;
}

.info-card .icon{
    font-size:40px;
}

.info-card h2{
    color:#1e3c72;
    font-size:30px;
}

.info-card p{
    color:#666;
}

.dashboard-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:20px;
}

.progress{
    width:100%;
    height:28px;
    background:#e5e7eb;
    border-radius:30px;
    overflow:hidden;
}

.progress-blue{
    height:100%;
    background:#1976d2;
    color:white;
    text-align:center;
    line-height:28px;
}

.progress-green{
    height:100%;
    background:#26a69a;
    color:white;
    text-align:center;
    line-height:28px;
}

.card{
    border-radius:16px;
}

table th{
    background:#1e3c72;
    color:white;
}

@media(max-width:768px){

    .dashboard-cards{
        grid-template-columns:1fr;
    }

    .dashboard-grid{
        grid-template-columns:1fr;
    }

    .dashboard-header h1{
        font-size:22px;
    }

}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>🏘️ Sistem Penduduk<br><small style="font-size:11px;">Desa Digital</small></h2>
        <div class="menu-label">Menu Utama</div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
        <div class="menu-label">Data Master</div>
        <a href="{{ route('provinsi.index') }}" class="{{ request()->routeIs('provinsi.*') ? 'active' : '' }}">🗺️ Provinsi</a>
        <a href="{{ route('alamat.index') }}" class="{{ request()->routeIs('alamat.*') ? 'active' : '' }}">📍 Alamat</a>
        <a href="{{ route('keluarga.index') }}" class="{{ request()->routeIs('keluarga.*') ? 'active' : '' }}">👨‍👩‍👧‍👦 Keluarga</a>
        <a href="{{ route('penduduk.index') }}" class="{{ request()->routeIs('penduduk.*') ? 'active' : '' }}">👤 Penduduk</a>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>@yield('title')</h3>
            <div>
                <span style="margin-right:15px; color:#666; font-size:14px;">👤 {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>❌ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
