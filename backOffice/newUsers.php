
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
  <div class="formu_users">
<h2 class="h2_users">Création d'un nouvel utilisateur</h2>
<form class="form_users"action="../bdd/users.php" method="post">
  <label for="nameUsers" class="name">Nom d'utilisateur</label>
<input class="text_users" type="text" name="nameUsers" placeholder="nameUsers">
<label for="passwordsUsers" class="name">Mot de passe</label>
<input  class="text_users" type="password" name="passewordUsers" placeholder="passewordUsers">
<input class="ajouter" type="submit" value="Ajouter un utilisateur">
</form>
</div>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$sth = $pdo->prepare("SELECT * FROM users");
    $sth->execute();
  
    $users = $sth->fetchAll();
    ?>
    <table class="table "> 
        <thead>
<tr>
<th>Nom de l'utilisateurs</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
</thead>
<tr>
    <?php
    foreach ($users as $value) {?>

<th><?=$value["nameUsers"]?></th>
<th><a class="ajouter" href="./updateUsers.php?idUsers=<?=$value['idUsers']?>" method="GET">Modifier</a></th>
<th><a class="ajouter" href="./deleteUsers.php?idUsers=<?=$value['idUsers']?>">Supprimer</a></th>


</tr>

<?php
    } 
    ?>
</table>
</body>
</html>