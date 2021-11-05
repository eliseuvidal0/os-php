<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>O.S</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand" href="#">TSA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link text-warning" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="http://localhost:8080/view/gerarOrdem.php">Gerar ordem</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="http://localhost:8080/view/consultar.php">Consultar ordens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="http://localhost:8080/view/consultarClientes.php">Consultar clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="http://localhost:8080/recibo.php">Imprimir recibo</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
    <!--
    <div class="container">
        <button type="button" class="btn btn-success btn-lg btn-block" onclick="window.location.href='http://localhost:8080/view/gerarOrdem.php';">Gerar ordem</button>
        <button type="button" class="btn btn-warning btn-lg btn-block" onclick="window.location.href='http://localhost:8080/view/consultar.php';">Consultar ordens</button>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='http://localhost:8080/recibo.php';">Imprimir recibo</button>
    </div>
    -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>

</html>