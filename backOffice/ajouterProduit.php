
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
    <div class=back_produit>
     <h1 class="h1_products">Ajouter un produit</h1>
   
    
    <div class="form_produit">

    
 
  
    
   <form class="form_produit" enctype="multipart/form-data" action=../bdd/produit.php  method="post">
   <div>
   <label class="name"for="nameProducts">Nom du produit :</label>
       <input class="text_products" type="text" id="nameProducts" name="nameProducts" >
       <label class="name" for="priceProducts">Prix :</label>
       <input class="text_products" type="text" id="priceProducts" name="priceProducts" >
       <label class="name" for="descriptionProducts">Description :</label>
       <textarea class="text_products"  name="descriptionProducts" id="descriptionProducts" rows="5" cols="35"></textarea>
      </div>
      <div>
<label class="name" for="idCategory">Catégorie du produit</label>
       <select class="text_products" name="idCategory">
        <?php foreach ($category as $value){ ?>
<option class="text_products" value="<?=$value['idCategory']?>"><?=$value['nameCategory']?>
<?php } ?>
</option>
       </select>
       <label class="name" for="image">Image du produit :</label>
       <input type="file" id="image" name="image" accept="image/png, image/jpeg">
    
       <input  class="ajouter" type="submit" id="envoyer" name="envoyer" value="Ajouter">
       </div>
   <form>
   </div>
<div class="table_produit">
   <?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);



    $sth = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory");
    $sth->execute();
  
    $products = $sth->fetchAll();
    ?>
    <table class="table "> 
        <thead>
<tr>
<th>Nom Produit</th>
<th>Prix</th>
<th>Description</th>
<th>Catégorie</th>
<th>Image</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
</thead>
<tr>
    <?php
    foreach ($products as $value) {?>

<th><?=$value["nameProducts"]?></th>
<th><?=$value['priceProducts']?></th>
<th><?=$value['descriptionProducts']?></th>
<th><?=$value['nameCategory']?></th>
<th><img src="../bdd/uploads/<?=$value['image']?>" width=150 height=100></th>
<th><a class="ajouter" href="./updateProducts.php?idProducts=<?=$value['idProducts']?>" method="GET">Modifier</a></th>
<th><a class="ajouter" href="./deleteProducts.php?idProducts=<?=$value['idProducts']?>" method="GET">Supprimer</a></th>
</tr>

<?php
    } 
    ?>
</table>
</div>
</div>
</div>



</body>
