
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Restaurant & Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

    <div class="card">
        <h2>Register Restaurant</h2>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name"
                       value="{{ old('name') }}" required>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       value="{{ old('email') }}" required>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Buat Password Baru</label>
                <input type="password" name="password" required>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password"
                       name="password_confirmation" required>
            </div>

            <button type="submit">Daftar Akun</button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>

</body>
</html>
