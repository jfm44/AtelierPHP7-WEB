<?php
    global $ensFilms;
    $ensFilms = ["Dracula","Kung fu Panda","Dora l'exploratrice"];
    header("Location: front_controler.php?action=liste_films");
    exit();
?>