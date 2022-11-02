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
<body>
        <h1>SUPPRIMER</h1>  
        <?php
            $sup=$_GET["idCategory"];
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                
                $sql = "DELETE FROM category WHERE idCategory=$sup";
                $sth = $pdo ->prepare($sql);
                $sth->execute();
                
                $count = $sth->rowCount();
                print('Effacement de ' .$count. ' entrées.');
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            header('Location:./ajouterCategorie.php');
        ?>
        
         
    </body>
</html>