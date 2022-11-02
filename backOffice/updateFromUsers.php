
<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$modif = $_GET["idUsers"];


$nameUsers = $_POST["nameUsers"];


//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
UPDATE users
SET nameUsers =:nameUsers
WHERE idUsers = $modif 
");


$sql->execute(array(
':nameUsers' => $nameUsers,
));

header('Location:newUsers.php');
?>