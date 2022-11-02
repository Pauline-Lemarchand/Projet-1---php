
<?php
require("header.php")

?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$sth = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory");
$sth->execute();

$products = $sth->fetchAll();

?>
<body>
    <div class="header_boutique">
<h1>BOUTIQUE</h1>
<p>Les plus belles baskets d'internet</p>
<div class="header_categorie">
<a href="#">Montantes</a>
<a href="#">Dunk</a>
<a href="#">Basses</a>
</div>
    </div>
<div class="produit"> 
    <div class="lesproduits">
  
        
<table>
        <?php
    foreach ($products as $value) {?>
<tr>

<th >
<th><img src="../bdd/uploads/<?=$value['image']?>" width=300 height=200> <th>
<h2><?=$value["nameProducts"]?></h2>
<p><?=$value['nameCategory']?></p>
<p><?=$value['priceProducts']?>€</p>
<p><?=$value['descriptionProducts']?></p>

<br>
    
    <a href="#">Ajouter au panier</a>
    <div class="test">
          </div>
    </th>
   
  
    </tr>
    </div>
    </div>
    
    <?php
    } 
    ?>
    </table>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>