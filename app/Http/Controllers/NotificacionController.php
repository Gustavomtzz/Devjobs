<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;


class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //Listar TODAS LAS NOTIFICACIONEs
        $allNotificaciones = auth()->user()->readNotifications;

        //Listar las NUEVAS Notificaciones del usuario autenticado
        $notificaciones = auth()->user()->unreadNotifications;

        //Marcar como Leidas las Notificaciones
        $notificaciones->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
            'allNotificaciones' => $allNotificaciones,
        ]);
    }
}
