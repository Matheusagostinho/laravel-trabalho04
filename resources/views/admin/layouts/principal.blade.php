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

    <title>Encontra Aqui</title>
</head>

<body>
    <nav class=" orange darken-4">
        <div class="container">
            <a href="/" class="brand-logo"> Encontra Aqui</a>
            <ul class="right">
                <li><a href="#" class=""> Cidades</a> </li>
                <li><a href="#" class=""> Serviços</a></li>

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
</body>

</html>
