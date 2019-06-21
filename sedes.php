<?php
    session_start();
    require 'php/get.php';
    $get = new get();

    $result = $get->getSP("get_Sedes()");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="sedes.php">Sedes</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                
                <?php if(isset($_SESSION['usuario'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['usuario'][0]['Usuario'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" id="cerrar">Cerrar Sesión</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Inicar Sesión</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex flex-wrap justify-content-around">
                <?php while ($row = $result->fetch_array()) { ?>
                    <div class="card text-center mb-5" style="width: 18rem">
                        <img src="data:image/jpeg; base64, <?php echo  base64_encode($row["imgSede"]); ?>" class="card-img-top estadio" id="<?php echo $row['idSede'] ?>" style="cursor:pointer; height: 200px">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['DireccionSede']; ?></h4>
                        </div>
                    </div>
                <?php } $result->free_result(); ?>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
    <script>
        $('.estadio').click(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "sede.php",
                data: {id: $(this).attr('id')},
                success: function (response) {
                    window.location.href = "sede.php";
                }
            });
            console.log($(this).attr('id'));
        });    
    </script>
</body>
</html>