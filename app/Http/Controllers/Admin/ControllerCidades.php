<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerCidades extends Controller
{
    public function cidades()
    {
        $subtitulo = "Cidades";
        $cidades = ["Pirapora", "Várzea da Palma", "Montes Claros"];

        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }
}
