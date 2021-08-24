@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($owners as $owner)
            <tr>
                <td>{{$owner->name}}</td>
                <td>{{$owner->phone}}</td>
                <td>{{$owner->cidade->name}}</td>
                <td class="right-align">
                    <a href="{{route('admin.owners.edit', $owner->id)}}">
                        <button type="submit" style="border:0; background:transparent; cursor: pointer; ">
                            <span>
                                <i class="material-icons blue-text text-accent-3">edit</i>
                            </span>
                        </button>
                    </a>
                    <form action="{{ route('admin.owners.destroy', $owner->id) }}" method="POST"
                        style="display: inline;">
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
                <td colspan="2">Não possui Proprietários Cadastrados!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.owners.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>


</section>

@endsection
