<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="login-page">
    <div class="login-container">
        <h1>Bem-vindo de volta</h1>
        <p>Entre com suas credenciais</p>
        <form method="POST" action="/login">
            @csrf
            <label for="email">E-mail</label>
            <input type="email" id="email" name=email required>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>