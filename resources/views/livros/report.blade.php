<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style></style>
</head>
<body>
    <h3>{{$titulo}}</h3>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Páginas</th>
            <th scope="col">Avaliação</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($livros as $livro)
            <tr>
                <th scope="row">{{$livro->id}}</th>
                <td>{{$livro->titulo}}</td>
                <td>{{$livro->autor}}</td>
                <td>{{$livro->paginas}}</td>
                <td>{{$livro->estrelas->estrelas ?? ''}}</td>
              </tr>
            @empty
            <tr>
                <td colspan="5">Sem Registro</td>
              </tr>

            @endforelse
        </tbody>
      </table>

</body>
</html>
