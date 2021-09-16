@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">

    <form action="{{route('admin.cars.index')}}" method="GET">
        <div class="row valign-wrapper">
            <div class=" col s6">
                <label for="brand_id">Tipo do Veiculo</label>
                <select name="brand_id" id="brand_id" class="browser-default">
                    <option value={{old('brand_id', $brand_id  ?? '')}}>
                        {{ old($car->brand->name ?? 'Selecione o tipo do Veículo', $car->brand->name  ??  'Selecione o tipo do Veículo')}}
                    </option>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}" {{$brand->id == $brand_id ? 'selected': ''}}> {{$brand->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s6">
                <input type="text" name="model" id="model" value="{{$model}}" />
                <label for="model">Modelo do Véiculo</label>
            </div>
        </div>
        <div class="row right-align">
            <button class="btn waves-effect waves-light" type="submit">Pesquisar</button>
            <a href="{{route('admin.cars.index')}}" class="btn-flat waves-effect">Exibir todos</a>

        </div>
    </form>
</section>
<hr />
<section class="section">
    <table class="highlight responsive-table">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Tipo</th>
                <th>Valor da Diaria</th>
                <th>Propietário</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cars as $car)
            <tr>

                <td style="width:20%; font-weight:bold; font-size:1.3rem;">
                    <a href="{{ route('admin.cars.show', $car->id) }}" class="orange-text text- darken-4"
                        style=" margin-left:5px; cursor: pointer; width:100%; display:block; font-weight:bold;"><strong>{{$car->model}}</strong></a>
                </td>

                <td>{{$car->year}}</td>
                <td>{{$car->brand->name}}</td>
                <td>{{$car->daily}}</td>
                <td>{{$car->owner->name}}</td>
                <td class="right-align">
                    <a href="{{route('admin.cars.fotos.index', $car->id)}}" title="fotos">
                        <button type="submit" style="border:0; background:transparent; cursor: pointer; ">
                            <span>
                                <i class="material-icons green-text text-lighten-1">insert_photo</i>
                            </span>
                        </button>
                    </a>
                    <a href="{{route('admin.cars.edit', $car->id)}}">
                        <button type="submit" style="border:0; background:transparent; cursor: pointer; ">
                            <span>
                                <i class="material-icons blue-text text-accent-3">edit</i>
                            </span>
                        </button>
                    </a>
                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border:0; background:transparent; cursor: pointer; ">
                            <span>
                                <i class="material-icons red-text text-accent-3"> delete_forever</i>
                            </span>
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Não possui Veículos Cadastrados ou que atendem os critérios de pesquisa!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.cars.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>


</section>

@endsection
