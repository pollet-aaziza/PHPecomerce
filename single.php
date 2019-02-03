<?php
session_start ();
//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
if(!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit;
}
//On charge le fichier connexion pour accéder aux données
require "Model/connexion.php";
include "Template/header.php";
// on stocke l'id qu'on a récupéré  dans la variable $id
$id = $_GET["id"];
//On récupère nos produits via la fonction, plus tard celle-ci effectuera une requête en base de données
$req = $bdd->prepare('SELECT * FROM product WHERE id = ?');
$req->execute([$id]);
$product=$req->fetch(PDO::FETCH_ASSOC);

  //On boucle pour afficher tous les produits contenus dans la variable products

?>
    <article class="col-lg-6 my-4">

      <div class="card">

        <div class="card-body">

          <h5 class="card-title"><?php echo $product["name"] ?></h5>

          <p class="card-text"><?php echo $product["description"] ?></p>

        </div>

        <ul class="list-group list-group-flush">

          <li class="list-group-item">Prix : <?php echo $product["price"] ?></li>

          <li class="list-group-item">Lieu de production: <?php echo $product["made_in"] ?></li>

          <li class="list-group-item">Catégorie : <?php echo $product["category"] ?></li>
          <?php if ($product["stock"] == 1) {
            echo "<a href='bascketTraitement.php?id=" .$product['id'] . "'>Ajouter</a>";
          }else {
           echo "Indisponible";
          }

          ?>
        </ul>

        </article>
