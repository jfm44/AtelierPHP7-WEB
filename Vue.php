<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php
            include './Presentation/entetePage.php';
        ?>
    </head>
    <body>
        <?php
            include "./Vues/" . $maVue . ".php";
        ?>       
    </body>
    <footer>
        <?php
            include './Presentation/piedPage.php';
        ?>        
    </footer>
</html>
