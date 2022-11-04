<?php
require("header.php")

?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if ($_GET && $_GET['idCategory'] != "none") {
    $cat = $_GET['idCategory'];
    $sth = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory WHERE category.idCategory = $cat");
} else {

    $sth = $pdo->prepare("SELECT * FROM products INNER JOIN category ON products.idCategory = category.idCategory");
}
$sth->execute();

$products = $sth->fetchAll();

?>

<body>
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                
                <img src="../bdd/uploads/airforce.jpg" class="d-block w-100" alt="...">
                *
                <div class="carousel-caption d-none d-md-block">
                    <h1>BOUTIQUE</h1>
                    <p>Les plus belles baskets d'internet</p>
                    <div class="header_categorie">
                        <a href="#">Montantes</a>
                        <a href="#">Dunk</a>
                        <a href="#">Basses</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../bdd/uploads/airforce.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>BOUTIQUE</h1>
                    <p>Les plus belles baskets d'internet</p>
                    <div class="header_categorie">
                        <a href="#">Montantes</a>
                        <a href="#">Dunk</a>
                        <a href="#">Basses</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../bdd/uploads/airforce.jpg"" class=" d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>BOUTIQUE</h1>
                    <p>Les plus belles baskets d'internet</p>
                    <div class="header_categorie">
                        <a href="#">Montantes</a>
                        <a href="#">Dunk</a>
                        <a href="#">Basses</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- <div class="header_boutique">
  

    
        <h1>BOUTIQUE</h1>
        <p>Les plus belles baskets d'internet</p>
        <div class="header_categorie">
            <a href="#">Montantes</a>
            <a href="#">Dunk</a>
            <a href="#">Basses</a>
        </div>
    </div> -->
        <?php
        $sth = $pdo->prepare("SELECT * FROM category");
        $sth->execute();
        $category = $sth->fetchAll(PDO::FETCH_ASSOC);





        ?>
        <form action="" class="filtrage">
            <label for="catégorie">Filtrer les produits</label>
            <select class="text_products" name="idCategory">
                <option value="none">Toutes les catégories</option>
                <?php foreach ($category as $value) { ?>
                    <option class="text_products" value="<?= $value['idCategory'] ?>"><?= $value['nameCategory'] ?>
                    <?php } ?>
                    </option>

            </select>
            <input class="ajouter" type="submit" value="Filtrer">
        </form>
        <table class="table_index">
            <tbody class="produit">
                <?php
                foreach ($products as $value) { ?>
                    <tr>

                        <th>
                            <div class="card" style="width: 18rem;">
                                <img src="../bdd/uploads/<?= $value['image'] ?> " width=285 height=150>
                                <div class="card-body test">
                                    <h2 class="card-title"><?= $value["nameProducts"] ?></h2>
                                    <p class="card-text"><?= $value['nameCategory'] ?></p>
                                    <h3 class="card-title"><?= $value['priceProducts'] ?>€</h3>
                                    <div class="button_index">
                                        <a href="../backOffice/fonction-panier.php?action=ajout&n=<?php echo $value['nameProducts'] ?>&q=1&p=<?php echo $value['priceProducts'] ?>" onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;"> Ajouter au panier</a>
                                        <a class="ajouter" href="../frontOffice/showProduit.php?idProducts=<?= $value['idProducts'] ?>"> Voir plus</a>
                                    </div>
                        </th>
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