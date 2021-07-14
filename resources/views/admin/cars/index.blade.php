@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Ano</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cars as $car)
            <tr>
                <td>{{$car->model}}</td>
                <td>{{$car->year}}</td>
                <td class="right-align">Editar - Remover</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Não possui Carros Cadastrados!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.cars.form')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>


</section>

@endsection
