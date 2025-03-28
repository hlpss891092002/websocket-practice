<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/login.js'])
    <title>log in</title>
</head>
<nav>
    <a href="/">home</a>
    <a href="/signup">sign up</a>
</nav>
<body>
    <h1>login</h1>
    <form action="/api/auth/login" method="post" class="login-form">
        @csrf
        <input type="text" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="password">
        <button type="submit">login</button>
    </form>
    <div>
        <span class="footer"></span>
    </div>
</body>

</html>