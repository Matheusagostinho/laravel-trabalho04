@extends('admin.layouts.principal')

@section('conteudo-principal')


<section class="section">

    <div class="row">
        <blockquote class="col s3 section" style="display: flex">
            <h6 style="font-weight: 700">Modelo do Veiculo: <span style="font-weight: 500"> {{$car->model}}</span></h6>
        </blockquote>
        <blockquote class="col s3 section" style="display: flex">
            <h6 style="font-weight: 700">Tipo do Veiculo: <span style="font-weight: 500"> {{$car->brand->name}}</span>
            </h6>
        </blockquote>
        <blockquote class="col s3 section" style="display: flex">
            <h6 style="font-weight: 700">Ano do Veículo: <span style="font-weight: 500"> {{$car->year}}</span></h6>
        </blockquote>
        <blockquote class="col s3 section" style="display: flex">
            <h6 style="font-weight: 700">Consumo médio: <span style="font-weight: 500"> {{$car->average}}</span></h6>
        </blockquote>
    </div>
    <div class="row">
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">Caracteristicas: <span style="font-weight: 500"> {{$car->feature}}</span></h6>
        </blockquote>
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">Valor da Diaria: <span style="font-weight: 500"> {{$car->daily}}</span></h6>
        </blockquote>
    </div>
    <div class="row">
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">Propietário do veiculo:
                <span style="font-weight: 500">
                    {{$car->owner->name}}
                </span>
            </h6>
        </blockquote>
    </div>
    <div class="row">
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">Telefone: <span style="font-weight: 500"> {{$car->owner->phone}}</span></h6>
        </blockquote>
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">E-maiL: <span style="font-weight: 500"> {{$car->owner->email}}</span></h6>
        </blockquote>
    </div>
    <div class="row">
        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">CPF: <span style="font-weight: 500"> {{$car->owner->cpf}}</span></h6>
        </blockquote>

        <blockquote class="col s6 section" style="display: flex">
            <h6 style="font-weight: 700">Cidade: <span style="font-weight: 500"> {{$car->owner->cidade->name}}</span>
            </h6>
        </blockquote>
    </div>


    <div class="right col s12" style="margin-top:2rem; margin-bottom:2rem;">
        <a href="{{route('admin.cars.index')}}" class="btn-flat waves-effect">Voltar</a>
        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn waves-effect">Editar</a>

    </div>

</section>


@endsection
