<aside class="col-lg-3">
  <figure>
    <img src="img/Aaziza(1).jpg" alt="">
  </figure>
  <ul class="list-group">
    <?php
    //On boucle sur l'utilisateur stocké en session pour afficher toutes ses informations
    foreach ($_SESSION["user"] as $key => $value) {
      echo "<li class='list-group-item'>$key : $value</li>";
    }
    ?>
  </ul>
  <a href="bascket.php" class="my-3">Votre panier</a>
  <ul class="list-group">
    <?php
      //On boucle sur le panier stocké en session pour afficher tous ses produits
      foreach ($_SESSION["bascket"] as $key => $product) {
        echo "<li class='list-group-item w-100'>". $product['name'] . "</li>";
      }
     ?>
     <li class='list-group-item'>Total : <?php echo $_SESSION["total"]; ?></li>
  </ul>
  <a href="logout.php" class="btn darkBg  my-3">Deconnexion</a>
</aside>
