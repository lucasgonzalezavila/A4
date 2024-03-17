<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller{
    public function index($id){
        // Verificar si el usuario es 'guest'
        if (Auth::user()->role === 'guest') {
            return abort(403, 'No tienes permiso para ver esta página.');
        }

        // Lógica para mostrar la vista del juego...
        $game = Game::findOrFail($id);
        return view('game', ['game' => $game]);
    }

    public function purchase($id){
    $game = Game::findOrFail($id);
    $user = auth()->user();
    
    // Crear la compra
    $purchase = new Purchase();
    $purchase->user_id = $user->id;
    $purchase->game_id = $id;
    $purchase->total_amount = $game->price; // Puedes ajustar esto según tu lógica de precios
    $purchase->note = 'Has alquilado este juego: ' . $game->title; // Nota automática
    $purchase->save();

    // Redireccionar a la vista de compra con el título y el código del juego
    return view('gamepurchase', ['game' => $game]);
    }

    public function delete($id){
        $game= Game::findOrFail($id);

    }
    public function update($id){
        $game = Game::findOrFail($id);
        
    }
    public function create(){
        return view('/addgame');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'description' => 'required|string',
            // Agrega aquí otras reglas de validación según sea necesario
        ]);

        $game = new Game();
        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->stock = $request->stock;
        $game->image = $request->image;
        $game->developer = $request->developer;
        $game->release_date = $request->release_date;
        $game->genre = $request->genre;
        $game->key = $request->key;
        $game->save();

        return redirect()->route('home')->with('success', 'Juego añadido exitosamente.');
    }

}
