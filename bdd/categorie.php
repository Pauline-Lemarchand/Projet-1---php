
<?php
 $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
try {
    $sql = "CREATE TABLE IF NOT EXISTS `ecommerce`.`category` (
    `idCategory` INT NOT NULL AUTO_INCREMENT ,
    `nameCategory` VARCHAR(100) NOT NULL , PRIMARY KEY (`idCategory`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
   
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
    }
    ?>

<?php


try {
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$nameCategory = $_POST["nameCategory"];

//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
INSERT INTO category(nameCategory)
VALUES (:nameCategory)
");
$sql->execute(array(
':nameCategory' => $nameCategory,
));
echo "Entrée ajoutée dans la table";
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
header('Location:../backOffice/ajouterCategorie.php');
?>