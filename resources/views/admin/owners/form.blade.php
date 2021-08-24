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
        @isset($owner)
        @method('PUT')
        @endisset
        <div class="input-field">
            <input type="text" name="name" id="name" value="{{old('name', $owner->name   ?? '')}}" />
            <label for="name">Nome do Propietário</label>
            @error('name')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="input-field">
            <input type="number" name="cpf" id="cpf" value="{{old('cpf', $owner->cpf  ?? '')}}" />
            <label for="cpf">CPF do Propietário</label>
            @error('cpf')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="input-field">
            <input type="email" name="email" id="email" value="{{old('email', $owner->email  ?? '')}}" />
            <label for="email">E-mail do Propietário</label>
            @error('email')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="input-field">
            <input type="number" name="phone" id="phone" value="{{old('phone', $owner->phone  ?? '')}}" />
            <label for="phone">Telefone do Propietário</label>
            @error('phone')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="">
            <label for="cidade_id">Cidade do Propietário</label>
            <select name="cidade_id" id="cidade_id" class="browser-default">
                <option value={{old('cidade_id', $owner->cidade_id  ?? 'null')}} disabled selected>
                    {{ old($owner->cidade->name ?? 'Selecione sua cidade', $owner->cidade->name  ??  'Selecione sua cidade')}}
                </option>
                @foreach ($cidades as $cidade)
                <option value="{{$cidade->id}}"> {{$cidade->name}}</option>
                @endforeach
            </select>

            @error('cidade_id')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="right" style="margin-top:2rem;">
            <a href="{{route('admin.owners.index')}}" class="btn-flat waves-effect">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Salvar</button>
        </div>
    </form>
</section>

@endsection
