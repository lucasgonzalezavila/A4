<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            margin-bottom: 10px;
            color: #666;
        }
        .image-container {
            margin-bottom: 20px;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .video-container {
            margin-bottom: 20px;
        }
        .video-container iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 8px;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f3f3;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container img {
    display: block;
    margin: 0 auto 20px;
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

h1 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #333;
}

p {
    margin-bottom: 10px;
    color: #666;
}

p strong {
    font-weight: bold;
    color: #333;
}
.en1{
    text-decoration: none;
    color: black;
}

    </style>
</head>
<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <img src="{{$game->image}}" alt="">
        <h1>{{ $game->title }}</h1>
        <p><strong>Genre:</strong> {{ $game->genre }}</p>
        <p><strong>Release Date:</strong> {{ $game->release_date }}</p>
        <p><strong>Price:</strong> ${{ $game->price }}</p>
        <p><strong>Description:</strong> {{ $game->description }}</p>
        <form action="{{ route('game.purchase', ['id' => $game->id]) }}" method="GET">
            @csrf
            <button type="submit">Alquilar juego</button>
        </form>
    </div>
</body>
</html>
