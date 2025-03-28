<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/signup.js'])
        <title>sign up</title>
    </head>
    <nav>
        <a href="/">home</a>
    </nav>
    <body>
        <h1>sign up</h1>
        <form action="/api/auth/register" method="post" class="signup-form">
            @csrf
            <input type="text" id="name" placeholder="name">
            <input type="text" id="email" placeholder="email">
            <input type="password" id="password" placeholder="password">
            <button class="signup-button" type="submit">sign up</button>
        </form>
    </body>
</html>