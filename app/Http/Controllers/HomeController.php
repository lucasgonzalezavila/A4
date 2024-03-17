<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller{
    public function index(){
        $juegos = Game::all(); 
        return view('home', ['juegos' => $juegos]);
    }
    public function delete($id){
        $game= Game::findOrFail($id);
        $game->delete();
        return redirect()->route('home')->with('success', 'El juego se eliminó correctamente');
    }
    public function update($id){
        $game = Game::findOrFail($id);
        $game->update();
        return redirect()->route('home')->with('success', 'El juego se eliminó correctamente');

    }
}

