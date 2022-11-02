
<?php
 $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
try {
    $sql = "CREATE TABLE IF NOT EXISTS `ecommerce`.`products` (
    `idProducts` INT NOT NULL AUTO_INCREMENT ,
    `nameProducts` VARCHAR(100) NOT NULL ,
    `descriptionProducts` VARCHAR(100) NOT NULL ,
    `priceProducts` INT(100) NOT NULL ,
    `idCategory` INT(100) NOT NULL,
    `image` VARCHAR(100) NOT NULL , PRIMARY KEY (`idProducts`),FOREIGN KEY(idCategory) REFERENCES `category` (`idCategory`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
   
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
    }
    ?>

<?php


try {
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$nameProducts = $_POST["nameProducts"];
$descriptionProducts = $_POST["descriptionProducts"];
$priceProducts = $_POST["priceProducts"];
$idCategory = $_POST["idCategory"];
$image = $_FILES["image"]["name"];

//$sql appartient à la classe PDOStatement
$sql = $pdo->prepare("
INSERT INTO products(nameProducts,descriptionProducts,priceProducts,idCategory,image)
VALUES (:nameProducts, :descriptionProducts, :priceProducts,:idCategory, :image)
");
$sql->execute(array(
':nameProducts' => $nameProducts,
':descriptionProducts' => $descriptionProducts,
':priceProducts' => $priceProducts,
':idCategory' =>$idCategory,
':image' => $image,
));
echo "Entrée ajoutée dans la table";
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
header('Location:../backOffice/ajouterProduit.php');
?>


<?php
//----------------SYSTEME D'UPLOAD D'IMAGES----------------------/
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// On vérifie si le fichier image est une image réelle ou une fausse image
if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["image"]["tmp_name"]);
 if($check !== false) {
 echo "File is an image - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "File is not an image.";
 $uploadOk = 0;
 }
}
// On vérifie si le fichier existe déjà
if (file_exists($target_file)) {
 echo "Désolé, ce fichier existe déjà.";
 $uploadOk = 0;
 }
// On vérifie la taille de l'image
if ($_FILES["image"]["size"] > 500000) {
 echo "Désolé, ce fichier dépasse la limite de taille autorisée.";
 $uploadOk = 0;
 }
// On vérifie le type de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
 $uploadOk = 0;
}
// On vérifie si $uploadOk est à 0 à cause d'une erreur
if ($uploadOk == 0) {
 echo "Désolé, votre fichier n'a pas été uploader";
 // Si tout est ok on essaye d'uploader le fichier
 } else {
 if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
 echo "Le fichier ". basename( $_FILES["image"]["name"]). " a bien été uploader."
;
 } else {
 echo "Sorry, there was an error uploading your file.";
 }
 }
 ?>