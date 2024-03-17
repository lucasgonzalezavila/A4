<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .game {
            width: 30%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
            cursor: pointer; /* Cambiar el cursor al pasar por encima */
        }
        .game img {
            width: 100%;
            height: auto;
        }
        @media print {
            .game {
                page-break-inside: avoid;
            }
        }
        .btngamediv {
            display: flex;
        }
    </style>
</head>
<body>
    <header>
        <h1>Videojuegos</h1>
    </header>
    <?php if (Route::has('login')): ?>
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <?php if (auth()->check()): ?>
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                <a href="{{url('/subscription')}}">Subscription</a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ url('/add-game') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Add Game</a>
                @endif
                <?php else: ?>
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                <?php if (Route::has('register')): ?>
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <section>
        @foreach ($juegos as $juego)
            <div class="game" onclick="redirectToGame('{{ $juego->id }}')">
                <img src="{{ $juego->image }}" alt="{{ $juego->title }}">
                <h2><strong>Title:</strong>{{ $juego->title }}</h2>
                <p><strong>Price:</strong>{{ $juego->price }}</p>
                <p><strong>Release Date:</strong>{{ $juego->release_date }}</p>
                <p><Strong>Description:</Strong>{{ $juego->description }}</p>
                <br>
                @if (auth()->check() && auth()->user()->role === 'admin')
                <div class="btngamediv">
                    <form action="{{ route('delete', $juego->id) }}" class="btngame" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este juego?')">Eliminar Juego</button>
                    </form> 
                </div>
            @endif            
            </div>
        @endforeach
    </section>

    <script>
        function redirectToGame(gameId) {
            window.location.href = "/game/" + gameId;
        }
    </script>
</body>
</html>
