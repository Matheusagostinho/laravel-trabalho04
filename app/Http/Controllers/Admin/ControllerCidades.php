<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;

class ControllerCidades extends Controller
{
    public function cidades()
    {
        $subtitulo = "Cidades";
        //$cidades = ["Pirapora", "Várzea da Palma", "Montes Claros"];
        $cidades = Cidade::all();


        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(CidadeRequest $request)
    {

        Cidade::create($request->all());

        $request->session()->flash('sucesso', "Cidade $request->nome adicionada com Sucesso!");

        return redirect()->route('admin.cidades.listar');
    }
}
