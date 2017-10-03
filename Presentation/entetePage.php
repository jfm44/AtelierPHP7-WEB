<?php
    echo "<title>" . $titre. "</title>" ;  
?>
<div>
    <?php
        if (isset($_SESSION["login"]))
        {
            //session_start();
            @$testAdm = $_SESSION["admin"];
            @$testlogin = $_SESSION["login"];
            @$NomConnexion = $_SESSION["nom"];
            if ($testAdm == True) 
            {
                echo "<h2> Bonjour administrateur </h2>";
            }
            else
            {
                echo "<h2> Bonjour " . $NomConnexion . " </h2>";
            }    
        }
        else 
        {
            echo "<h2> Bonjour Inconnu...</h2>";
        }
    ?>
    <menu>
        <a href="front_controler.php?action=liste_films">Films</a> 
        <a href="front_controler.php?action=liste_series">Series</a> 
        <?php
        if (isset($testlogin))
        {
            if ($testlogin == TRUE)
            {
                echo "<a href=\"front_controler.php?action=logout\">Logout</a>"; 
            }
            else 
            {
                echo "<a href=\"front_controler.php?action=login\">Login</a>"; 
            }
        }
        else
        {
            echo "<a href=\"front_controler.php?action=login\">Login</a>"; 
        }
        ?>
   </menu>
</div>
