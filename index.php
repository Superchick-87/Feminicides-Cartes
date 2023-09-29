<?php
include(dirname(__FILE__) . '/include/contenu.php');
include(dirname(__FILE__) . '/include/ddc.php');
include(dirname(__FILE__) . '/include/DateFr.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/aos.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
  <h1>Dates clés</h1>
  <?php
  // Chemin vers le fichier JSON
  $cheminFichierJSON = 'include/datasV2.json';

  // Lire le contenu du fichier JSON
  $contenuJSON = file_get_contents($cheminFichierJSON);

  // Décoder le JSON en tant que tableau associatif
  // Vérifier si le décodage a réussi
  $data = json_decode($contenuJSON, true);

  include(dirname(__FILE__) . '/include/TriDate.php');

  echo '  <main> ';
  if ($datas === null) {
    echo "Erreur lors de la lecture du JSON.";
  } else {
    // Accéder aux valeurs du JSON
    foreach ($datas as $key => $value) {
      echo '<div class = "card">
        <img src="' . $value["Url_Photo"] . '" alt="">
        <div class="pictoDossier ' . $value['Dossier'] . '"></div>
        <div class="card-content">
        <div class="x">
          <h3><mark> ' . formatDate(date_create($value['Date']), 'd F Y', 'fr') . '</mark></h3>
            <h2><mark>' . $value['Victime'] . '</mark></h2> 
            <h3><mark>' . $value['Ville'] . '</mark></h3>
            
          </div>
        <div style="position: absolute; top: 90px;">
        <p>' . $value['Resume'] . '</p>';
      echo '
          <a href="' . $value['Lien_1'] . '" class="button" target="_blank">' . $value['Libelle_1']  . ' </a>
          <a href="' . $value['Lien_2'] . '" class="button" target="_blank">' . $value['Libelle_2']  . ' </a>
          ';
      echo '
       </div>
       </div>
       </div>
       <br><br>';
    }
  }
  echo '</main>';
  ?>
  </main>
  <footer></footer>
</body>

<script>
  // Sélectionnez tous les divs avec la classe "div-classe"
  const divs = document.querySelectorAll('.button');
  // Parcourez les divs et changez la classe sur chaque deuxième div
  for (let i = 0; i < divs.length; i++) {
    console.log(divs);
    if (divs[i].innerHTML == ' ') { // L'indice est impair (0-based)
      divs[i].style.display = "none";
    }
  }

  const divDossier = document.querySelectorAll('.pictoDossier');
  // Parcourez les divs et changez la classe sur chaque deuxième div
  for (let i = 0; i < divDossier.length; i++) {
    console.log(divDossier);
    if (divDossier[i].className == 'pictoDossier non') { // L'indice est impair (0-based)
      divDossier[i].style.display = "none";
    }
  }
</script>

</html>