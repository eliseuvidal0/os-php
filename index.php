<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>O.S</title>
    <style>
        div {
            position: absolute;
            top: 150px;
            left: 100px;
        }
        html,body
        {
            background-image: url('imagens/img.jpg');
            background-size: cover;
        }
    </style>

</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-success btn-lg btn-block" onclick="window.location.href='http://localhost/ordem/ordem.php';">Gerar ordem</button>
        <button type="button" class="btn btn-warning btn-lg btn-block" onclick="window.location.href='http://localhost/ordem/buscar.php';">Consultar ordens</button>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>

</html>