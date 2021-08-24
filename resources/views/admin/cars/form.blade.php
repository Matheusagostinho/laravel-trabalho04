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
    <form action="{{$action }}" class="form" method="POST">
        @csrf
        @isset($car)
        @method('PUT')
        @endisset
        <div class="input-field">
            <input type="text" name="model" id="model" value="{{old('model', $car->model   ?? '')}}" />
            <label for="model">Modelo do Veículo</label>
            @error('model')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="year" id="year" value="{{old('year', $car->year  ?? '')}}" />
                <label for="year">Ano do Veículo</label>
                @error('year')
                <span class="red-text text-accent-3">
                    <small>{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="input-field col s4">
                <input type="number" name="average" id="average" value="{{old('average', $car->average  ?? '')}}" />
                <label for="average">Consumo médio</label>
                @error('average')
                <span class="red-text text-accent-3">
                    <small>{{$message}}</small>
                </span>
                @enderror
            </div>
            <div class="col s4">
                <label for="brand_id">Tipo do Veiculo</label>
                <select name="brand_id" id="brand_id" class="browser-default">
                    <option value={{old('brand_id', $car->brand_id  ?? '')}} disabled selected>
                        {{ old($car->brand->name ?? 'Selecione o proprietário', $car->brand->name  ??  'Selecione o tipo do Veículo')}}
                    </option>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}"> {{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea type="text" name="feature" id="feature" class="materialize-textarea"
                    value="{{old('feature', $car->feature  ?? '')}}">{{old('feature', $car->feature  ?? '')}}</textarea>
                <label for="feature">Caracteristicas</label>
                @error('feature')
                <span class="red-text text-accent-3">
                    <small>{{$message}}</small>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col s8">
                <label for="owner_id">Propietário do veiculo</label>
                <select name="owner_id" id="owner_id" class="browser-default">
                    <option value={{old('owner_id', $car->owner_id  ?? '')}} selected disabled>
                        {{ old($car->owner->name ?? 'Selecione o proprietário', $car->owner->name  ??  'Selecione o proprietário')}}
                    </option>
                    @foreach ($owners as $owner)
                    <option value="{{$owner->id}}"> {{$owner->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s4">
                <input type="number" name="daily" id="daily" value="{{old('daily', $car->daily  ?? '')}}" />
                <label for="daily">Valor da Diaria</label>
                @error('daily')
                <span class="red-text text-accent-3">
                    <small>{{$message}}</small>
                </span>
                @enderror
            </div>
        </div>
        <div class="right" style="margin-top:2rem;">
            <a href="{{route('admin.cars.index')}}" class="btn-flat waves-effect">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Salvar</button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.autocomplete');
            var instances = M.Autocomplete.init(elems, options);
        });

    </script>
</section>

@endsection
