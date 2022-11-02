
<?php
 $pdo = new PDO('mysql:host=localhost;dbname=loueurvoiture;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
try {
    $sql = "CREATE TABLE IF NOT EXISTS `ecommerce`.`users` (
    `idUsers` INT NOT NULL AUTO_INCREMENT ,
    `nameUsers` VARCHAR(100) NOT NULL ,
    `passewordUsers` VARCHAR(100) NOT NULL ,
    `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idUsers`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
   
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
    }
    ?>


<?php


try {
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$nameUsers = $_POST["nameUsers"];
$passewordUsers = $_POST["passewordUsers"];

$passewordUsers  = password_hash($_POST['passewordUsers '], PASSWORD_DEFAULT);
//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
INSERT INTO users(nameUsers,passewordUsers)
VALUES (:nameUsers, :passewordUsers)
");
$sql->execute(array(
':nameUsers' => $nameUsers,
':passewordUsers' => $passewordUsers,
));
echo "Entrée ajoutée dans la table";
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
header('Location:backOffices.php');
?>


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
echo 'Mauvais identifiant ou mot de passe !';
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