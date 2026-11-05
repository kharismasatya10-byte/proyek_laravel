<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SIM-Surat</title>
</head>
<body>
    <h1>Login SIM-Surat</h1>
    
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </p>
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <p>
            <label>Password</label><br>
            <input type="password" name="password">
        </p>
        @error('password')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit">Masuk</button>
    </form>
</body>
</html>