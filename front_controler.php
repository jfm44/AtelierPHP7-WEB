<?php
    $titre = "Nouveau Site vachement bô";
    session_start();
    
    static $maVue;
    //static $adm = FALSE;
/**
 * Le controleur ne contient pas de code de présentation
 * Uniquement du PHP
 */
// recupération d'un paramètre de l'url
    @$actionChoisie = $_REQUEST["action"];
    
    switch ($actionChoisie)
    {
        case "ajoute_film_post" : 
            @$nomFilmRecu = $_REQUEST["nomFilm"];
            echo $nomFilmRecu;
            $ensFilms[]=$nomFilmRecu;
            header("Location: front_controler.php?action=liste_films");
            exit();
        
        case "logout" :
            session_destroy();
            $titre = "Nouveau Site vachement bô";
            $maVue = "login";
            header("Location: front_controler.php?action=login");
            exit;
        
        case "login" :
            $titre = "Login";
            $maVue = "login";
            break;
        
        case "login_post" :
            // retour de login  
            @$loginRecu = $_REQUEST["login"];
            @$mdpRecu = $_REQUEST["mdp"];
            if (($loginRecu == "admin") && ($mdpRecu == "admin"))              
            {
                // OK             
                $_SESSION["login"] = TRUE;
                $_SESSION["admin"] = TRUE;
                $_SESSION["nom"] = $loginRecu;
                //Redirection sur la page de liste des films 
                // on dit au navigateur d'envoyer un requet GET liste_films
                header("Location: front_controler.php?action=liste_films");
                exit;
            }
            else
            {
                //KO
                $_SESSION["login"] = TRUE;
                $_SESSION["admin"] = FALSE;
                $_SESSION["nom"] = $loginRecu;
                $titre = "Login";
                $maVue = "login";                
            }
            
            
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
            $titre = "Ajoout Film";
            $maVue = "ajoute_film";
            break;
        
        case "ajoute_serie" :
            break;
        case "supprime_film" :
            break;
        case "supprime_serie" :
            break;
        default :
            echo "erreur action inconnue";
            $titre = "Login";
            $maVue = "login";
            break;
            //exit();
    }
   
    //Afficher la page
    include './Vue.php';