<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = "Lista de Veículos";

        $cars = Car::all();


        return view('admin.cars.index', compact('subtitulo', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.cars.store');
        $owners = Owner::all();
        $brands = Brand::all();
        return view('admin.cars.form', compact('action', "owners", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $owner = Owner::find($request->owner_id);
        $request->cidade_id = $owner->cidade_id;

        Car::create($request->all());

        $request->session()->flash('sucesso', "Modelo $request->model Adicionado com Sucesso!");

        return redirect()->route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $action = route('admin.cars.update', $car->id);
        $owners = Owner::all();
        $brands = Brand::all();
        return view('admin.cars.form', compact('car', 'action', "owners", 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        $car->save();
        $request->session()->flash('sucesso', "Modelo $request->model Modificado com Sucesso!");

        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Car::destroy($id);

        $request->session()->flash('sucesso', "Carro excluído com Sucesso!");

        return redirect()->route('admin.cars.index');
    }
}
