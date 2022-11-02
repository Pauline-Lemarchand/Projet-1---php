
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$modif = $_GET["idProducts"];


$nameProducts = $_POST["nameProducts"];
$descriptionProducts = $_POST["descriptionProducts"];
$priceProducts = $_POST["priceProducts"];
$idCategory = $_POST["idCategory"];
//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
UPDATE products
SET nameProducts =:nameProducts,descriptionProducts =:descriptionProducts,priceProducts =:priceProducts,idCategory =:idCategory
WHERE idProducts = $modif 
");


$sql->execute(array(
':nameProducts' => $nameProducts,
':descriptionProducts' => $descriptionProducts,
':priceProducts' => $priceProducts,
':idCategory' => $idCategory,

));

header('Location:ajouterProduit.php');
?>