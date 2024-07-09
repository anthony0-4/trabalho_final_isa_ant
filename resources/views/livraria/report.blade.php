<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3>{{$titulo}}</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($livrarias as $livraria)
            <tr>
                <th scope="row">{{$livraria->id}}</th>
                <td>{{$livraria->nome}}</td>
                <td>{{$livraria->endereco}}</td>
                <td>{{$livraria->cnpj}}</td>
                <td>{{$livraria->cidade}}</td>
                <td>{{$livraria->estados->estados ?? ""}}</td>
              </tr>
            @empty
            <tr>
                <td colspan="6">Sem Registro</td>
              </tr>

            @endforelse
        </tbody>
      </table>

</body>
</html>
