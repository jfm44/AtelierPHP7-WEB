<?php

include './lib/lib_db.php';
include_once './vendor/autoload.php';

session_start();
static $maVue;
static $tabDonnees = [];

// Ajoute l'util connecté ds $tabDonnées
if( isset($_SESSION["nom"]) ){
    $tabDonnees["Utilisateur"] = $_SESSION["nom"];
}

//static $adm = FALSE;
/**
 * Le controleur ne contient pas de code de présentation
 * Uniquement du PHP
 */
// recupération d'un paramètre de l'url
@$actionChoisie = $_REQUEST["action"];
switch ($actionChoisie) {
    case "cree_tables" :
        creatTabUsers();
        creatTabFilms();
        break;

    case "ajoute_film_post" :
        @$nomFilmRecu = $_REQUEST["nomFilm"];
        stockFilm($nomFilmRecu);
        header("Location: front_controler.php?action=liste_films");
        exit();

    case "logout" :
        session_destroy();
        $titre = "Nouveau Site vachement bô";
        header("Location: front_controler.php?action=login");
        exit;

    case "login" :
        $titre = "Login";
        $maVue = "login.html.twig";
        break;

    case "login_post" :
        // retour de login  
        @$loginRecu = $_REQUEST["login"];
        @$mdpRecu = $_REQUEST["mdp"];
        
        if (($loginRecu == "admin") && ($mdpRecu == "admin")) {
            // OK             
            $_SESSION["login"] = TRUE;
            $_SESSION["admin"] = TRUE;
            $_SESSION["nom"] = $loginRecu;
            $tabDonnees["Utilisateur"] = $loginRecu;
            header("Location: front_controler.php?action=liste_films");
            exit;
        } else {
            //KO
            $_SESSION["login"] = TRUE;
            $_SESSION["admin"] = FALSE;
            $_SESSION["nom"] = $loginRecu;
            $tabDonnees["Utilisateur"] = $loginRecu;
            $titre = "Login";
            $maVue = "login";
        }

    case "liste_films" :
        // les films sonts dans la variable ensFilms si on est connecté
        if (isset($_SESSION["login"])) {
            $ensFilms = lister_Films();
        }
        //include './liste_films.php';
        $titre = "Films";
        $maVue = "liste_films.html.twig";
        $tabDonnees["films"] = $ensFilms;
        break;

    case "liste_series" :
        break;

    case "ajoute_film" :
        if (isset($_SESSION["login"])) {
            $titre = "Ajoout Film";
            $maVue = "ajoute_film.html.twig";
        } 
        else {
            throw new Exception("Opération interdite !");
        }
        break;

    case "ajoute_serie" :
        break;

    case "supprime_film" :
        @$titeASupprimer = $_REQUEST["titre"];
        delFilm($titeASupprimer);
        header("Location: front_controler.php?action=liste_films");
        exit();

    case "supprime_serie" :
        break;
    
    default :
        //echo "erreur action inconnue";
        $_SESSION["login"] = FALSE;
        $_SESSION["admin"] = FALSE;
        $_SESSION["nom"] = "";
        $titre = "Login";
        $maVue = "login.html.twig";
        break;
    
}

// Afficher la vue
echo $maVue;
echo "<br>";
echo ">" . $_SESSION["nom"] . "<";
echo "<br>";

$loader = new Twig_Loader_Filesystem("TWIG");
$twig = new Twig_Environment($loader);
echo $twig->load($maVue)->render( $tabDonnees );
