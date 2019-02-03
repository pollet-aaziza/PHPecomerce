<?php
//On redémarre immédiatement la section pour avoir accès aux informations
session_start();
//Si aucun utilisateur est enregistré en session on renvoi à l'acceuil
if(!isset($_SESSION["user"])) {
  header("Location: index.php");
  exit;
}
//On charge la connexion à la db pour accéder aux données
require "Model/connexion.php";
include "Template/header.php";
 ?>

 <div class="row mt-5">
    <section class="col-lg-9">
      <h2>Nos derniers produits</h2>
      <div class="container-fluide">
        <div class="row">

          <?php
            //On boucle pour afficher le tableau $_SESSION à l'index ["bascket"]
            $delId = 0;
            foreach ($_SESSION["bascket"] as $key => $product) {
          ?>
          <article class="col-lg-6 my-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product["name"] ?></h5>
                <p class="card-text"><?php echo $product["price"] ?></p>
                <?php echo "<a href='bascketTraitement.php?delId=".$delId . "'>Retirer</a>"; ?>
              </div>
              <div class="card-body">
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
 include "Template/footer.php";
  ?>
