@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <h4>{{$car->model}}</h4>
    <div class="flex-container">
        @forelse ($fotos as $foto)
        <div class="flex-item">
            <span class="btn-fechar">
                <form action="{{ route('admin.cars.fotos.destroy', [$car->id, $foto->id]) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border:0; background:transparent; cursor: pointer; ">
                        <span>
                            <i class="material-icons red-text text-accent-3"> delete_forever</i>
                        </span>
                    </button>
                </form>


            </span>
            <img src={{asset("storage/$foto->url")}} alt="" height="100">
        </div>
        @empty
        <div>
            <p>Não existem fotos para esse veiculo!</p>
        </div>
        @endforelse
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light"
            href="{{route('admin.cars.fotos.create', $car->id)}}">
            <i class="large material-icons">add</i>
        </a>
    </div>


</section>

@endsection
