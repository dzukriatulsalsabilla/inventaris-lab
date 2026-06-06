<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth') - Inventaris Lab RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        .auth-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            background: white;
        }
        .auth-brand {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
            text-align: center;
        }
        .auth-form {
            padding: 3rem 2.5rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
        }
        .btn-auth {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
            color: white;
        }
        .auth-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .auth-link:hover { color: #764ba2; text-decoration: underline; }
        .feature-item { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
        @media (max-width: 768px) {
            .auth-brand { padding: 2rem; }
            .auth-form { padding: 2rem 1.5rem; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>