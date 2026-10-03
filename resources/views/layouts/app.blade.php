<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack("seo")
    <title>@yield("title", config("app.name"))</title>

    @vite(["resources/css/app.css", "resources/js/app.js"])

</head>
<body class="bg-zinc-100">
    <livewire:ui.nav-component/>
    {{ $slot }}
</body>
</html>