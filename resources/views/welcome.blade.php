<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smaržu Katalogs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        window.authUser = @json(auth()->user());
    </script>
</head>
<body class="antialiased">
    <div id="app"></div>
</body>
</html>