<?php
//On charge le fichier  qui ontient la onnexion à la base de données
require "Model/connexion.php";
require "Service/formCleaner.php";
require "Service/loginManager.php";
//On vérifie si le formulaire a été rempli
if(!empty($_POST)) {
  $_POST = cleanFormEntries($_POST);
  //On récupère les utilisateurs stockés sur le site (dans la bdd).
  $request = $bdd->query('SELECT * FROM user');
  $users=$request->fetchall(PDO::FETCH_ASSOC);
  //On vérifie si on trouve une correspondance avec les infromations du formulaire
  if(userIsRegistered($users, $_POST)) {
    header("Location: products.php");
    exit;
  }
  else {
    header("Location: index.php?message=Nous n'avons aucun utilisateur avec ce nom ou ce mot de passe");
    exit;
  }

}
//Si le formulaire n'est pas rempli on renvoie l'utilisateur sur la page de login avce un message
else {
  header("Location: index.php?message=Vous devez remplir les champs du formulaire");
  exit;
}

 ?>
