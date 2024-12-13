<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Basketball')</title>
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>MY BASKETBALL</h1>
            </div>

        </div>
    </header>

    @yield('content')

</body>
</html>
