
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

    <table class="table_index">
        <tbody class="produit">
    <?php
    foreach ($products as $value) {?>
<tr>
   
    <th><div class="card" style="width: 18rem;">
    <img src="../bdd/uploads/<?=$value['image']?> "width=285 height=150>
  <div class="card-body test">
  <h2 class="card-title"><?=$value["nameProducts"]?></h2>
  <p class="card-text"><?=$value['nameCategory']?></p>
  <h3 class="card-title"><?=$value['priceProducts']?>€</h3>
  <p class="card-text"><?=$value['descriptionProducts']?></p>
  <a  href="../backOffice/fonction-panier.php?action=ajout&n=<?php echo $value['nameProducts']?>&q=1&p=<?php echo $value['priceProducts']?>"onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">  Ajouter au panier</a></th>
  </div>
  
</div>
</tr>

<?php
    } 
    ?>
    </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>