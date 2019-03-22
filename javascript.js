function checkMdp() {
  var mdp = document.getElementById("mdp").value,//la virgule répercute le var sur la deuxième déclaration
  mdp2 = document.getElementById("mdp2").value;//donc pas besoin de var ici
  if (mdp !== mdp2) {//vu que les deux sont des chaînes de caractères, autant utiliser !== qui est plus rapide. Il faut d'ailleurs mieux toujorus l'utiliser et convertir des deux opérandes
    var msg = document.createTextNode("Confirmation du mot de passe invalide");
    document.getElementById("mdperror").appendChild(msg);
  }
}