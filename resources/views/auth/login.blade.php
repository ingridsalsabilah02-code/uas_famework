<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Penduduk Desa</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 50%, #01579b 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 45px 40px;
            border-radius: 15px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
            width: 420px;
        }
        .login-container .header {
            text-align: center;
            margin-bottom: 35px;
        }
        .login-container .header .icon {
            font-size: 55px;
            margin-bottom: 10px;
        }
        .login-container .header h2 {
            color: #1a237e;
            font-size: 22px;
            margin-bottom: 5px;
        }
        .login-container .header p {
            color: #666;
            font-size: 13px;
        }
        .form-group {
            margin-bottom: 22px;
        }
        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #1a237e;
        }
        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
            margin-top: 5px;
        }
        .login-btn:hover {
            opacity: 0.9;
        }
        .error-msg {
            background: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 13px;
            border: 1px solid #ffcdd2;
        }
        .info-box {
            margin-top: 25px;
            padding: 15px;
            background: #e3f2fd;
            border-radius: 8px;
            font-size: 12px;
            color: #1565c0;
            border: 1px solid #bbdefb;
        }
        .info-box strong {
            display: block;
            margin-bottom: 5px;
            color: #0d47a1;
        }
        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <div class="icon">🏘️</div>
            <h2>Sistem Penduduk Desa</h2>
            <p>Masukkan akun Anda untuk mengakses sistem</p>
        </div>

        @if($errors->any())
            <div class="error-msg">
                ⚠️ {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda" autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password Anda">
            </div>
            <button type="submit" class="login-btn">MASUK KE SISTEM</button>
        </form>

        <div class="footer-text">
            © 2024 Sistem Penduduk Desa | UAS Framework
        </div>
    </div>
</body>
</html>
