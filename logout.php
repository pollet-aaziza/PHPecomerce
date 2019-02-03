<?php

session_start();

$_SESSION = array();

session_destroy();

header('Location: index.php');

exit;

// on recupère le produit par son id
foreach ($products as $key => $product) {
  echo "<li class='list-group-item'>$key : $value</li>";
}


?>
