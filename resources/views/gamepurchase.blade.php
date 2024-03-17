<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Purchase Details</title>
</head>
<body>
    <h1>JUEGO ALQUILADO CORRECTAMENTE</h1>
    <p>NOMBRE DEL JUEGO ALQUILADO: {{ $game->title }}</p>
    <p>CÓDIGO DEL JUEGO ALQUILADO: {{ $game->key }}</p>
    <a href="/">HOME</a>
</body>
</html>
