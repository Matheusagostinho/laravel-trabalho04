<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Car;
use App\Models\Foto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Image;
use Symfony\Component\Process\Process;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCar)

    {
        $car = Car::find($idCar);
        $fotos = Foto::where('car_id', $idCar)->get();
        return view('admin.cars.fotos.index', compact('fotos', 'car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCar)
    {
        $car = Car::find($idCar);
        return view('admin.cars.fotos.form', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idCar)
    {

        //chegar se veio o arquivo
        if ($request->hasFile('foto')) {

            if ($request->foto->isValid()) {



                $fotoURL = $request->foto->hashName("cars/$idCar");
                $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'), env('FOTO_ALTURA'));
                Storage::disk('public')->put($fotoURL,  $imagem->encode());
                $foto = new Foto();
                $foto->url =  $fotoURL;
                $foto->car_id =  $idCar;
                $foto->save();
            };
        };
        $request->session()->flash('sucesso', "Foto incluída com sucesso!");
        return redirect()->route('admin.cars.fotos.index', $idCar);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idCar, $idFoto)
    {
        $foto = Foto::find($idFoto);
        Storage::disk('public')->delete($foto->url);

        $foto->delete();

        $request->session()->flash('sucesso', "Foto excluída com sucesso!");
        return redirect()->route('admin.cars.fotos.index', $idCar);
    }
}
