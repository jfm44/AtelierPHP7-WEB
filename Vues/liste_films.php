<?php
    if (isset($_SESSION["login"]))
    {
        if ($testAdm == True) 
        {
            printf("<a href=\"front_controler.php?action=ajoute_film\"><INPUT TYPE=\"submit\" NAME=\"btAjouter\" VALUE=\"Ajouter un Film\"></a>");
        }
    }
    else 
    {
        printf("<label> Vous devez vous connecter </label>");
        printf("<a href=\"front_controler.php?action=login\"><input type=\"submit\" value=\"Login\"\></a>");
    }    
?>
<TABLE>
       <TR>
           <TH>Titre</TH><TH>Action</TH>
       </TR>
<?php
    if (isset($_SESSION["login"]))
    {
        //session_start();
        if ($testAdm == True) 
            {
                For($i=0;$i<count($ensFilms);$i++)
                { 
                    printf("<TR><TD> %d - %s </TD> <TD>");
                    printf("<INPUT TYPE=\"submit\" NAME=\"btSupprimer\" VALUE=\"Supprimer\"></TD></TR>",$i+1,$ensFilms[$i]);
                }
            }
            else
            {
                For($i=0;$i<count($ensFilms);$i++)
                { 
                    printf("<TR><TD> %d - %s </TD> <TD><INPUT TYPE=\"submit\" NAME=\"btInforme\" VALUE=\"Informations\"></TD></TR>",$i+1,$ensFilms[$i]);
                }
            }    
    }

?>
       <BUTTON
</TABLE>

