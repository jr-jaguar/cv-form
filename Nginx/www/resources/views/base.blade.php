<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('head_scripts')
    @yield('head_styles')
    <!-- Додайте ваші стилі CSS тут -->
</head>
<body>

<header>
    <!-- Тут ваш хедер -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Тут ваш футер -->
</footer>

<!-- Додайте ваші скрипти JavaScript тут -->
@yield('scripts')
</body>
</html>
