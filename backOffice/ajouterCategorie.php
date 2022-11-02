
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
    <title>BACKOFFICE</title>
</head>
<div class="page_back">
<header>
<nav class="nav_backOffice">
<ul>
    <li><img class="logo_back"src="../style/logo ecommerce.png" alt=""></li>
<li><a href="../frontOffice/index.php">Revenir au site</a></li>
  <li><a href="ajouterCategorie.php">Catégorie</a></li>
  <li><a href="ajouterProduit.php">Produit</a></li>
  <li><a href="newUsers.php">Utilisateurs</a></li>
 
</ul>

</nav>
</header>
<body>
    

<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$sth = $pdo->prepare("SELECT * FROM category");
$sth->execute();
$category = $sth->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="back_category">
    <div class="form_category">

    
  <h1>Ajouter une catégorie</h1>
   
  
    
   <form class="form-category" action=../bdd/categorie.php  method="post">
   <label class="nameCategory" for="nameCategory">Nom de la catégorie :</label>
       <input class="text_category" type="text" id="nameCategory" name="nameCategory" >
       <input class="ajouter"type="submit" id="envoyer" name="envoyer" value="Ajouter">
   <form>
   </div>
<div class="table_category">
   <?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);



    $sth = $pdo->prepare("SELECT * FROM category");
    $sth->execute();
  
    $products = $sth->fetchAll();
    ?>
    <table class="table "> 
        <thead>
<tr>
<th>Nom catégorie</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
<tr>
</thead>
    <?php
    foreach ($category as $value) {?>

<th><?=$value["nameCategory"]?></th>
<th><a class="ajouter" href="./updateCategory.php?idCategory=<?=$value['idCategory']?>" method="GET">Modifier</a></th>
<th><a class="ajouter" href="./deleteCategory.php?idCategory=<?=$value['idCategory']?>">Supprimer</a></th>

</tr>

<?php
    } 
    ?>
</table>
</div>
</div>
</div>



</body>