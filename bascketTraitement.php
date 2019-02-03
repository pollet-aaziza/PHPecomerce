<?php
// je démarre ma session
session_start();
// je me connecte à ma base de données
require "Model/connexion.php";
// on verefie que le produit existe autrement dit que l'id recupéré est défini.
if (isset($_GET["id"])){
  // on déclare la variable qui va stocker le tableau selon l'id recupérée
  $id = $_GET["id"];


} elseif (isset($_GET["delId"])){
  // on déclare la variable qui va stocker le tableau selon l'id recupérée
  $delId = $_GET["delId"];
}
function addProduct($id, $bdd){
  $req = $bdd->prepare('SELECT * FROM product WHERE id = ?');
  $req->execute([$id]);
  $product=$req->fetch(PDO::FETCH_ASSOC);
  // si $product est vide ou si le stock n'existe pas
  if (empty($product) || $product["stock"] == false) {
    // envoie vers la page ci-dessous
    header("Location: products.php");
  }
  // sinon ajoute le produit récupèré
  else {
    array_push($_SESSION["bascket"], $product);
    $_SESSION["total"] += $product["price"];
    header("Location: bascket.php");
  }
}
function deleteProduct($delId) {
  // on va dans le tableau total pui dans le tableau panier pour y soustraire le prix de l'élément à la position delid
 $_SESSION["total"] -= $_SESSION["bascket"][$delId]["price"];
 // on utilise unset pour supprimer
 unset($_SESSION["bascket"][$delId]);
 header("Location: bascket.php");
}
// vider le panier
function emptyBasket(){
  $_SESSION["bascket"] =[];
  $_SESSION["total"] =0;
}
if (isset($id)){
  addProduct($id, $bdd);
} elseif (isset($delId)){
  deleteProduct($delId);
}elseif ($_GET['emptyBasket']=="true") {
  emptyBasket();
  header("Location: bascket.php");
}
?>
