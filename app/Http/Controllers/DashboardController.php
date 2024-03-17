<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario actualmente autenticado
        $userId = Auth::id();

        // Obtener las notas de compra del usuario actual
        $purchases = Purchase::where('user_id', $userId)->get();

        return view('dashboard', ['purchases' => $purchases]);
    }
}
