<?php
function creationPanier(){
 if (!isset($_SESSION['panier'])){
 $_SESSION['panier']=array();
 $_SESSION['panier']['name'] = array();
 $_SESSION['panier']['quantity'] = array();
 $_SESSION['panier']['price'] = array();
 }
 return true;
}

function ajouterArticle($name,$quantity,$price){
    //Si le panier existe
    if (creationPanier())
    {
    //Si le produit existe déjà on ajoute seulement la quantité
    $positionProduit = array_search($name, $_SESSION['panier']['name']);
    if ($positionProduit !== false)
    {
    $_SESSION['panier']['quantity'][$positionProduit] += $quantity ;
    }
    else
    {
    //Sinon on ajoute le produit
    array_push( $_SESSION['panier']['name'],$name);
    array_push( $_SESSION['panier']['quantity'],$quantity);
    array_push( $_SESSION['panier']['price'],$price);
    }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }
   function supprimerArticle($name){
    //Si le panier existe
    if (creationPanier())
    {
    //Nous allons passer par un panier temporaire
    $tmp=array();
    $tmp['name'] = array();
    $tmp['quantity'] = array();
    $tmp['price'] = array();
    for($i = 0; $i < count($_SESSION['panier']['name']); $i++)
    {
    if ($_SESSION['panier']['name'][$i] !== $name)
    {
    array_push( $tmp['name'],$_SESSION['panier']['name'][$i]);
    array_push( $tmp['quantity'],$_SESSION['panier']['quantity'][$i]);
    array_push( $tmp['price'],$_SESSION['panier']['price'][$i]);
    }
    }
    //On remplace le panier en session par notre panier temporaire à jour
    $_SESSION['panier'] = $tmp;
    //On efface notre panier temporaire
    unset($tmp);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }

?>
