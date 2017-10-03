<?php
    static $ensFilms = ["Dracula","Kung fu Panda","Dora l'exploratrice"];
    static $maVue;
/**
 * Le controleur ne contient pas de code de présentation
 * Uniquement du PHP
 */
// recupération d'un paramètre de l'url
    @$actionChoisie = $_REQUEST["action"];
    
    switch ($actionChoisie)
    {
        case "liste_films" :
            // les films sonts dans la variable ensFilms
            //$ensFilms
            // Envoyer les films à la vue (page)
            //include './liste_films.php';
            $titre = "Films";
            $maVue = "liste_films";
            break;
        
        case "liste_series" :
            break;
        case "ajoute_film" :
            break;
        case "ajoute_serie" :
            break;
        case "supprime_film" :
            break;
        case "supprime_serie" :
            break;
        default :
            echo "erreur action inconnue";
            exit();
    }
   
    //Afficher la page
    include './Vue.php';