<?php
include(dirname(__FILE__) . '/include/contenu.php');
include(dirname(__FILE__) . '/include/ddc.php');
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

  <br>
  <h1>Dates clés</h1>
  <!-- <div class="container"> -->



  <!-- </div> -->
 
      <?php
echo '  <main> ';
      // Chemin vers le fichier JSON
      $cheminFichierJSON = 'include/datas.json';

      // Lire le contenu du fichier JSON
      $contenuJSON = file_get_contents($cheminFichierJSON);

      // Décoder le JSON en tant que tableau associatif
      $data = json_decode($contenuJSON, true);
      // Vérifier si le décodage a réussi
      $n = 1;
      if ($data === null) {
        echo "Erreur lors de la lecture du JSON.";
      } else {
        // Accéder aux valeurs du JSON
        foreach ($data as $key => $value) {


         echo '<div class = "card">
         <img src="' . $value["Url_Photo"] . '" alt="">
         <div class="card-content">
         <h2>
           ' . $value["Date"] .  '<br> ' . $value['Victime'] . '<br>(' . $value['Ville'] . ')
           </h2> 
           <div style="position: absolute; top: 110px;"><p>
           '. $value['Resume'] .' 
           </p>';
           foreach ($value['Lien'] as $keyc => $valuec) {
            for ($i = 0; $i < count($valuec); $i++) {
              echo '  <a href="' . $valuec[$i][0] . '" class="button" target="_blank">
              ' . $valuec[$i][1] . ' 
              </a>';
            };
          };
          echo '
       </div>';

       
 
          // echo '<div class="container" 
          //     data-aos="flip-up" 
          //     data-aos-easing="ease-out-cubic"
          //     data-aos-duration="1000">
          //     <div class="content">';
          // echo "<h2>" . $value["Date"] . "</h2>";
          // echo "<h3>(" . $value['Ville'] . ")</h3>";
          // echo "<h1>" . $value['Victime'] . "</h1><br>";
          // echo '<img class="picture" src="' . $value["Url_Photo"] . '" alt="Féminicides : ' . $value["Victime"] . '"/></br>';
          // echo "<p>" . $value['Resume'] . "</p><br>";
          // foreach ($value['Lien'] as $keyc => $valuec) {
          //   $i = 0;
          //   for ($i = 0; $i < count($valuec); $i++) {
              // echo '<form action=" ' . $valuec[$i][0] . '" method="get" target="_blank">
              //   <button class="' . ddc($valuec[$i][1]) . '" type="submit">
              //           <div>' . $valuec[$i][1] . '</div></button>
              //       </form>';
          //   }
          // }

          echo '</div>
                </div>';
          echo "<br><br>";
        }
      }echo '</main>';
      ?>
</main>
  <footer></footer>
</body>

<script src="js/aos.js"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });

  // Sélectionnez tous les divs avec la classe "div-classe"
  const divs = document.querySelectorAll('.container');

  // Parcourez les divs et changez la classe sur chaque deuxième div
  for (let i = 0; i < divs.length; i++) {
    if (i % 2 === 1) { // L'indice est impair (0-based)
      divs[i].classList.add('right');
    } else {
      divs[i].classList.add('left');
    }
  }
</script>

</html>