<?php
            $sup=$_GET["idProducts"];
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                
                $sql = "DELETE FROM products WHERE idProducts=$sup";
                $sth = $pdo ->prepare($sql);
                $sth->execute();
                
                $count = $sth->rowCount();
                print('Effacement de ' .$count. ' entrées.');
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            header('Location:./ajouterProduits.php');
        ?>