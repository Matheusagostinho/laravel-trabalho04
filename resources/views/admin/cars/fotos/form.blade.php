@extends('admin.layouts.principal')

@section('conteudo-principal')

@if ($errors->any())
<div class="red-text">
    <ul>
        @foreach ($errors as $error)
        <li>{{error}}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="section">
    <form action="{{route('admin.cars.fotos.store', $car->id)}}" class="form" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="file-field input-field">
            <div class="btn">
                <span>Selecionar Foto</span>
                <input type="file" name="foto" />
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validate">
            </div>
            @error('foto')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="right" style="margin-top:2rem;">
            <a href="{{url()->previous()}}" class="btn-flat waves-effect">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Adicionar</button>
        </div>
    </form>

</section>

@endsection
