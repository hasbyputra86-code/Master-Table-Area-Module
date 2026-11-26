
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restaurant & Cafe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="navbar">
        <h2>Restaurant & Cafe System</h2>
    </div>

    <div class="login-container">
        <div class="title">
            <h1>Login</h1>
            <p>Sign in to manage restaurant employees.</p>
        </div>

        <div class="card">
            @if ($errors->any())
                <p style="color: red;">
                    {{ $errors->first() }}
                </p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password"
                           placeholder="Enter your password" required>
                </div>

                <div class="button-area">
                    <button type="submit" class="btn-save">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>
</body>
</html>
