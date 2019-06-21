<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="./img/logo.png" alt="" width="80px"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sedes.php">Sedes</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Inicar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="card text-left mt-5">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="User" id="User" placeholder="Usuario o Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="Pass" id="Pass" placeholder="Contraseña">
                        </div>
                        <button class="btn btn-primary btn-block" id="iniciar">Iniciar Sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('#iniciar').click(function (e) { 
            e.preventDefault();
            var User = $('#User').val();
            var Pass = $('#Pass').val();
            $.ajax({
                type: "POST",
                url: "php/login.php",
                data: {User: User, Pass: Pass},
                success: function (response) {
                    if(response) {
                        location.href = 'index.php';
                    } else {
                        alert('Error al iniciar sesión');
                    }
                }
            });
        });
    </script>
</body>
</html>