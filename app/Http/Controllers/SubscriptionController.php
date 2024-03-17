<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {
    public function index() {
        $user = Auth::user();
        $subscription = $user->subscriptions()->latest()->first(); // Obtener la suscripción del usuario

        $timeLeft = null; // Inicializar la variable $timeLeft

        if ($subscription) {
            $endDate = Carbon::parse($subscription->end_date);
            $timeLeft = Carbon::now()->diffInDays($endDate);
        }

        return view('subscription', compact('subscription', 'timeLeft'));
    }

    public function update(Request $request, $id) {
        $subscription = Subscription::findOrFail($id);

        // Actualizar la fecha de finalización agregando 30 días
        $subscription->update([
            'end_date' => Carbon::parse($subscription->end_date)->addDays(30)
        ]);

        return redirect()->back()->with('success', 'Subscription extended by 30 days successfully!');
    }

    public function extend(Request $request) {
        $user = Auth::user();
        $subscription = $user->subscriptions()->latest()->first();
    
        // Verificar si el usuario tiene una suscripción
        if ($subscription) {
            // Extender la suscripción
            $endDate = Carbon::parse($subscription->end_date)->addDays(30);
    
            // Actualizar la fecha de finalización y el estado activo
            $subscription->end_date = $endDate;
            $subscription->active = $endDate > $subscription->created_at;
    
            // Guardar los cambios
            $subscription->save();
    
            return redirect()->back()->with('success', 'Subscription extended by 30 days successfully!');
        } else {
            // Si el usuario no tiene una suscripción, puedes manejarlo según tu lógica de negocio
            // Por ejemplo, redirigirlo a la página de suscripción
            return redirect()->route('subscription.index')->with('error', 'You don\'t have an active subscription.');
        }
    }
    
}
