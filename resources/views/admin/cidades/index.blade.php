@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <table class="highlight">
        <thead>
            <tr>
            <th>{{$subtitulo}}</th>
            <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cidades as $cidade)
            <tr>
                <td>{{$cidade}}</td>
                <td class="right-align">Editar - Remover</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" >Não possui cidades cadastradas!</td>
            </tr>
            @endforelse
        </tbody>
        </table>
</section>

@endsection
