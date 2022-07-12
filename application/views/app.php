<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= $baseUrl.'/css/bootstrap-5.2.0/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?= $baseUrl.'/css/DataTables-1.12.1/jquery.dataTables.min.css' ?>">
  <link rel="stylesheet" href="<?= $baseUrl.'/css/style.css' ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="<?= $baseUrl.'/js/jquery-3.6.0.min.js' ?>"></script>
  <script src="<?= $baseUrl.'/js/bootstrap-5.2.0/bootstrap.min.js' ?>"></script>
  <title>Cafeteria Konecta</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <a class="navbar-brand" href="<?= $baseUrl.'/home' ?>"><span><i class="fa fa-home" aria-hidden="true"></i></span> Home</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl.'/register' ?>">Crear producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl.'/sells' ?>">Listar ventas</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Renderiza un contenido diferente segun la URL que se ingrese -->
  <div class="container">
    <?= $bodyContent ?>
  </div>
  <!-- ------------------------------------------------------------ -->

  <script>  
    let uri = "<?php echo $baseUrl; ?>";
  </script>
  <script src="<?= $baseUrl.'/js/DataTables-1.12.1/jquery.dataTables.min.js' ?>"></script>
</body>
</html>