 <?php

function userIsRegistered($users, $form) {
  foreach ($users as $user) {
    if($user["name"] === $form["user_name"] && $user["password"] === $form["user_password"]) {
      //Si c'est le cas on démarre une session pour y stocker les informations de l'utilisateur
      startUserSession($user);
      return true;
    }
  }
}
// cette session stocke les données de l'utilisateur
function startUserSession($user) {
  session_start();
  $_SESSION["user"] = $user;
  // notre panier sous forme d'un tableau $_SESSION
  $_SESSION["bascket"] =[];
  $_SESSION["total"] =0;

}

 ?>
