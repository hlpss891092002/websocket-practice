<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<nav>
    <a href="/">home</a>
    <a href="/signup">sign up</a>
</nav>
<body>
    <h1>login</h1>
    <form action="/login" method="post" class="login-form">
        @csrf
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">login</button>
    </form>
    <div>
        <span class="footer"></span>
    </div>
</body>

</html>