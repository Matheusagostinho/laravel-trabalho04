<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class ControllerCars extends Controller
{
    public function cars()
    {
        $subtitulo = "Carros";

        $cars = Car::all();


        return view('admin.cars.index', compact('subtitulo', 'cars'));
    }

    public function formAdicionar()
    {
        return view('admin.cars.form');
    }

    public function adicionar(CarRequest $request)
    {

        Car::create($request->all());

        $request->session()->flash('sucesso', "Modelo $request->model Adicionado com Sucesso!");

        return redirect()->route('admin.cars.listar');
    }
}
