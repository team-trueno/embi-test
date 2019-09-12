<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugador;

class RankingController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::orderBy('puntos', 'DESC')->paginate(15);
        // $usuarios = User::paginate(15);
        return view('ranking', compact('jugadores'));
    }
}
