<?php
try {
$pdo = new PDO(
'mysql:host=localhost;dbname=ecommerce;port=3306',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$nameUsers = $_POST['nameUsers'];
// Récupération de l'utilisateur et de son pass hashé
$req = $pdo->prepare('SELECT * FROM users WHERE nameUsers = :nameUsers');
$req->execute(array(
'nameUsers' => $nameUsers
));
$resultat = $req->fetch();
// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['passewordUsers'], $resultat['passewordUsers']);
if (!$resultat) {
    header("location:../frontOffice/index.php");
} else {
if ($isPasswordCorrect) {
session_start();
$_SESSION['idUsers'] = $resultat['idUsers'];
$_SESSION['nameUsers'] = $nameUsers;
header("location:../frontOffice/index.php");
} else {
header("location:../backOffice/backOffice.php");
}
}
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();}