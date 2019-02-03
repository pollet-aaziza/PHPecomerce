<?php
//On redémarre immédiatement la section pour avoir accès aux informations
session_start();
//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
if(!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit;
}
//On se connecte à la base de données.
include "Model/connexion.php";

include "Template/header.php";
//On récupère nos produits via la fonction, plus tard celle-ci effectuera une requête en base de données
$request = $bdd->query('SELECT * FROM product');
$products=$request->fetchall(PDO::FETCH_ASSOC);

if(isset($_GET["success"])) {
  $message = htmlspecialchars($_GET["success"]);
  echo "<div class='alert alert-success w-50'>" . $message . "</div>";
}
 ?>

 <div class="row mt-5">
    <section class="col-lg-9 t_center">
      <h2>Nos derniers produits</h2>
      <div class="container-fluide">
        <div class="row">
          <?php
            //On boucle pour afficher tous les produits contenus dans la variable products
            foreach ($products as $key => $product) {
          ?>
          <article class="col-lg-6 my-4">
            <img class="card-img-top" src="img/Aaziza.jpg" alt="chevrolet impala noire">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product["name"] ?></h5>
                <p class="card-text"><?php echo $product["description"] ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Prix : <?php echo $product["price"] ?></li>
                <li class="list-group-item">Lieu de production: <?php echo $product["made_in"] ?></li>
                <li class="list-group-item">Catégorie : <?php echo $product["category"] ?></li>
              </ul>
              <div class="card-body">
                <?php
                // affiche moi ce produit dans la page single celui-ci est stocké dans $product en le recuperant par son id.
                 echo "<a href='single.php?id=" .$product['id'] . "'>voir produit</a>";
                 ?>
              </div>
            </div>
          </article>
          <?php
          //On ferme la boucle
            }
           ?>
        </div>
      </div>
    </section>
    <!-- Aside avec les informations utilisateur -->
    <?php include "Template/aside.php"; ?>
  </div>

 <?php
 include "Template/footer.php"
  ?>
