<?php
      session_start();
      
      
      $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      $sth = $pdo->prepare("SELECT * FROM users");
      $sth->execute();
      $users = $sth->fetchAll(PDO::FETCH_ASSOC);


      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3507128011.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <title>ecommerce</title>
</head>

<header>
<nav id="top-scroll" class="navbar navbar-expand-lg bg-light ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
     
    <span class="navbar-toggler-icon"></span>
    </button>
    
      <a class="navbar-brand" href="../frontOffice/index.php"><img class="logo"src="../style/logo ecommerce.png" alt="logo ecommerce"></a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../frontOffice/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../frontOffice/index.php">Boutique</a>
        </li>
      </ul>
      </div>
      </div>
      <ul class="icon_accueil">
     
       <?php foreach ($users as $value) { ?>
        <li class="text_products" value="<?= $value['idUsers'] ?>">Bonjour <?= $value['nameUsers'] ?>
        <?php } ?>
        </li>
      
         <li><a href="../backOffice/../backOffice/connexion.php"><i class="fa-solid fa-user"></a></i></li>
         <li><a href="../backOffice/fonction-panier.php"><i class="fa-solid fa-basket-shopping"></a></i></li>
      </ul>
   
</nav>
</header>