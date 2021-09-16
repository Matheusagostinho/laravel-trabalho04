<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {


        $cars = Car::orderBy('model', 'asc');

        $model = $request->model;
        $brand_id = $request->brand_id;

        if ($brand_id) {
            $cars->where('brand_id',  $brand_id);
        }

        if ($model) {
            $cars->where('model', 'like', "%$model%");
        }



        $cars = $cars->get();



        $brands = Brand::orderBy('name')->get();


        return view('site.cars.index', compact('cars', "brands", "brand_id", "model"));
    }

    public function show($id)
    {
        $car = Car::find($id);

        return view('site.cars.show', compact('car'));
    }
}
