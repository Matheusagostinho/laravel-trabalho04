<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = "Lista de Proprietários";

        $owners = Owner::all();


        return view('admin.owners.index', compact('subtitulo', 'owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $action = route('admin.owners.store');
        return view('admin.owners.form', compact('action', 'cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        Owner::create($request->all());
        DB::commit();

        $request->session()->flash('sucesso', "$request->name  Adicionado com Sucesso!");

        return redirect()->route('admin.owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        $action = route('admin.owners.update', $owner->id);
        $cidades = Cidade::all();
        return view('admin.owners.form', compact('owner', 'action', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::find($id);

        $owner->update($request->all());
        $owner->save();
        $request->session()->flash('sucesso', "Modelo $request->model Modificado com Sucesso!");

        return redirect()->route('admin.owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Owner::destroy($id);

        $request->session()->flash('sucesso', "Usuário excluído com Sucesso!");

        return redirect()->route('admin.owners.index');
    }
}
