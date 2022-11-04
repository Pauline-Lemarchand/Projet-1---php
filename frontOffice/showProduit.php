
<?php
require("header.php")

?>

<?php
            $sup=$_GET["idProducts"];
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                
                $sql ="SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory";
                $sth = $pdo ->prepare($sql);
                $sth->execute();

            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>

   <?php

   $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

   if($_GET && $_GET['idProducts']){
    $cat=$_GET['idProducts']; 
    $sth=$pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory WHERE idProducts = $cat");
   
}
$sth->execute();

$products = $sth->fetchAll();
        ?>
      <?php
            foreach ($products as $value) { ?>
            <div class="show_products">
  <div class="row g-0 show2">
    <div class="col-md-4">
    <img src="../bdd/uploads/<?= $value['image'] ?> " width=500 height=400>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $value["nameProducts"] ?></h5>
        <p class="card-text"><?= $value['descriptionProducts'] ?></p>
        <p class="card-text"><small class="text-muted"><?= $value['priceProducts'] ?>€</small></p>
        <a class="ajouter" href="../backOffice/fonction-panier.php?action=ajout&n=<?php echo $value['nameProducts'] ?>&q=1&p=<?php echo $value['priceProducts'] ?>" onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;"> Ajouter au panier</a>
      </div>
    </div>
  </div>
</div>
  <?php
  }
  ?>
  </div>
</head>
<body>
    
</body>
</html>