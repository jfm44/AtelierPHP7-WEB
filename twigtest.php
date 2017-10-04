<?php
    include_once './lib/lib_db.php';
    
    
    
    // chage automatique les fichier et classes de twig
    require_once './vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem("TWIG");
    
    $twig = new Twig_Environment($loader);

    // Afficher 
echo $twig->load('liste_films.html.twig')->render( ["films"=> lister_Films()] );
