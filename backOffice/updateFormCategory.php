
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$modif = $_GET["idCategory"];


$nameCategory = $_POST["nameCategory"];
//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
UPDATE category
SET nameCategory= :nameCategory
WHERE idCategory = $modif
");


$sql->execute(array(
':nameCategory'=>$nameCategory,
));

header('Location:ajouterCategorie.php');
?>