<?php
function creationPanier(){
 if (!isset($_SESSION['panier'])){
 $_SESSION['panier']=array();
 $_SESSION['panier']['nameProducts'] = array();
 $_SESSION['panier']['quantity'] = array();
 $_SESSION['panier']['priceProducts'] = array();
 }
 return true;
}

function ajouterArticle($nameProducts,$quantity,$priceProducts){
 //Si le panier existe
 if (creationPanier())
 {
 //Si le produit existe déjà on ajoute seulement la quantité
 $positionProduit = array_search($nameProducts, $_SESSION['panier']['nameProducts']);
 if ($positionProduit !== false)
 {
 $_SESSION['panier']['quantity'][$positionProduit] += $quantity ;
 }
 else
 {
 //Sinon on ajoute le produit
 array_push( $_SESSION['panier']['nameProducts'],$nameProducts);
 array_push( $_SESSION['panier']['quantity'],$quantity);
 array_push( $_SESSION['panier']['priceProducts'],$priceProducts);
 }
 }
 else
 echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function supprimerArticle($nameProducts){
    //Si le panier existe
    if (creationPanier())
    {
    //Nous allons passer par un panier temporaire
    $tmp=array();
    $tmp['nameProducts'] = array();
    $tmp['quantity'] = array();
    $tmp['priceProducts'] = array();
    for($i = 0; $i < count($_SESSION['panier']['nameProducts']); $i++)
    {
    if ($_SESSION['panier']['nameProducts'][$i] !== $nameProducts)
    {
    array_push( $tmp['nameProducts'],$_SESSION['panier']['nameProducts'][$i]);
    array_push( $tmp['quantity'],$_SESSION['panier']['quantity'][$i]);
    array_push( $tmp['priceProducts'],$_SESSION['panier']['priceProducts'][$i]);
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
   function modifierQTeArticle($nameProducts,$quantity){
    //Si le panier existe
    if (creationPanier())
    {
    //Si la quantité est positive on modifie sinon on supprime l'article
    if ($quantity > 0)
    {
    //Recherche du produit dans le panier
    $positionProduit = array_search($nameProducts, $_SESSION['panier']['nameProducts']);
    if ($positionProduit !== false)
    {
    $_SESSION['panier']['quantity'][$positionProduit] = $quantity ;
    }
    }
    else
    supprimerArticle($nameProducts);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
   }
    function MontantGlobal(){
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['nameProducts']); $i++)
        {
        $total += $_SESSION['panier']['quantity'][$i] * $_SESSION['panier']['priceProducts'][$i];
        }
        return $total;
       }
 ?>