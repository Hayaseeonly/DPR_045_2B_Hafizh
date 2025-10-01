<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Gaji DPR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang abu-abu muda */
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="mb-0">Aplikasi Gaji DPR</h3>
                        <p class="mb-0">Silakan Login</p>
                    </div>
                    <div class="card-body p-4">

                        @if($errors->has('login'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('login') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf  <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </body>
</html>