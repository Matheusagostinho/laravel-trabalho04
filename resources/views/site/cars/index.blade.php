@extends('site.layouts.principal')

@section('conteudo-principal')

<section class="section lighten-4 center">

    <div style="display: flex; flex-wrap:wrap; justify-content: space-around">
        @forelse ($cars as $car)
        <div class="card" style="width: 290px; margin:10px;">
            <div class="card-image">
                @if (count($car->fotos) > 0)
                <img src="{{asset("storage/{$car->fotos[0]->url}")}}" alt="" />
                @endif
            </div>
            <div class="card-content">
                <p class="card-title">
                    {{$car->model}}
                </p>
                <p>
                    Valor da diaria: <strong>R$ {{$car->daily}}</strong>
                </p>
            </div>
            <div class="card-action">
                <a href="{{ route('cars.show', $car->id) }}" class="green-text"> Ver detalhes</a>
            </div>
        </div>
        @empty
        <p>Não existem veiculos disponiveis no momento!</p>
        @endforelse



    </div>
</section>

@endsection
