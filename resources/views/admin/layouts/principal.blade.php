<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <title>AlugaAqui</title>
</head>

<body>
    <nav class=" orange darken-4">
        <div class="container">
            <a href="/" class="brand-logo">AlugaAqui- Aluguel de Veículos</a>
            <ul class="right">
                <li><a href="{{route('admin.cars.index')}}" class=""> Veículos</a> </li>
                <li><a href="{{route('admin.owners.index')}}" class=""> Propietários</a></li>
            </ul>
        </div>
    </nav>




    <div class="container">
        @yield('conteudo-principal')
    </div>
    <!-- Compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        @if (session('sucesso'))

             M.toast({html: "{{session('sucesso')}}",  classes: 'rounded'});
        @endif

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });



        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>

</html>
