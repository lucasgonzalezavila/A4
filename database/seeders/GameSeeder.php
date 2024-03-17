<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(){
        Game::insert([
            [
                'nombre' => 'FIFA 22',
                'precio' => 59.99,
                'descripcion' => 'FIFA 22 es un videojuego de simulación de fútbol publicado por Electronic Arts como parte de la serie FIFA.',
                'imagen' => 'https://cdn.akamai.steamstatic.com/steam/apps/1506830/header.jpg?t=1695934909',
                'stock' => 100,
                'oferta_especial' => 0
            ],
            [
                'nombre' => 'GTA V',
                'precio' => 29.99,
                'descripcion' => 'Grand Theft Auto V es un videojuego de acción-aventura de mundo abierto desarrollado por Rockstar North y publicado por Rockstar Games.',
                'imagen' => 'https://store-images.s-microsoft.com/image/apps.23283.14086826113896348.0ac2ef86-2cca-45c3-9d11-1dc9ac71c024.54c1f17c-a245-453e-aaaf-f7603453b65a',
                'stock' => 150,
                'oferta_especial' => 0
            ],
            [
                'nombre' => 'Red Dead Redemption 2',
                'precio' => 49.99,
                'descripcion' => 'Red Dead Redemption 2 es un videojuego de acción-aventura western, en un mundo abierto y en perspectiva de primera y tercera persona.',
                'imagen' => 'https://cdn.akamai.steamstatic.com/steam/apps/1174180/header.jpg?t=1695140956',
                'stock' => 80,
                'oferta_especial' => 0
            ],
            [
                'nombre' => 'Minecraft',
                'precio' => 19.99,
                'descripcion' => 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox creado originalmente por el sueco Markus Persson.',
                'imagen' => 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_Minecraft_image1600w.jpg',
                'stock' => 200,
                'oferta_especial' => 0
            ],
            [
                'nombre' => 'Assassin\'s Creed Valhalla',
                'precio' => 49.99,
                'descripcion' => 'Assassin\'s Creed Valhalla es un videojuego de acción-aventura desarrollado por Ubisoft Montreal y publicado por Ubisoft.',
                'imagen' => 'https://staticctf.ubisoft.com/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/01lCIVJSjkjeeg5BYDawQi/548d2eb6b9897542dc57bd0194dc3e7f/ACV_KeyArt11__960x540.png',
                'stock' => 120,
                'oferta_especial' => 0
            ]
        ]);
    }
}
