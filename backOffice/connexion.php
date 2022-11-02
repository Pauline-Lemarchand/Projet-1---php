<?php
require("../frontOffice/header.php")
?>
<body class="body_connexion">
    

<?php


$pdo = new PDO('mysql:host=localhost;dbname=ecommerce;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    ?>

    <div class="connexion">
        <div class="connexion-2">
<a class="logo_connexion" href="../frontOffice/index.php"><img src="../style/logo ecommerce.png" alt="logo ecommerce"></a>
  <h1>Connectez-vous</h1>
   
  
    
  <form class="form_connexion" action="../bdd/login.php" method="post">
    <label for="nameUsers">Votre nom :</label>
<input type="text" name="nameUsers" >
<label for="passewordUsers">Votre mot de passe</label>
<input type="password" name="passewordUsers">
<input type="submit" value="Se connecter">
  </form>

  <a href="">Mot de passe oublié</a>
  </div>
  </div>
  </body>