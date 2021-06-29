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
    <form action="{{route('admin.cidades.adicionar')}}" class="form" method="POST">
        @csrf
        <div class="input-field">
            <input type="text" name="nome" id="nome" />
            <label for="nome">Nome da Cidade</label>
            @error('nome')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
        <div class="right-aling">
            <a href="{{url()->previous()}}" class="btn-flat waves-effect">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Salvar</button>
        </div>
    </form>
</section>

@endsection
