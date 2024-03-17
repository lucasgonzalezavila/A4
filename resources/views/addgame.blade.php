<!-- resources/views/games/addgame.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Juego</title>
</head>
<body>
    <h1>Agregar Nuevo Juego</h1>
    
    <form action="{{ route('add-game') }}" method="POST">
        @csrf
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="image">Imagen (URL):</label><br>
        <input type="text" id="image" name="image"><br><br>

        <label for="developer">Desarrollador:</label><br>
        <input type="text" id="developer" name="developer"><br><br>

        <label for="release_date">Fecha de Lanzamiento:</label><br>
        <input type="date" id="release_date" name="release_date"><br><br>

        <label for="genre">Género:</label><br>
        <input type="text" id="genre" name="genre"><br><br>

        <label for="key">Clave:</label><br>
        <input type="text" id="key" name="key"><br><br>
        
        <button type="submit">Agregar Juego</button>
    </form>
</body>
</html>
