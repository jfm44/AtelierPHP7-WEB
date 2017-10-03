<TABLE>
       <TR>
           <TH>Titre</TH><TH>Action</TH>
       </TR>
<?php

   For($i=0;$i<count($ensFilms);$i++)
   { 
       printf("<TR><TD> %d - %s </TD> <TD><INPUT TYPE=\"submit\" NAME=\"btSupprimer\" VALUE=\"Supprimer\"> </TD></TR>",$i+1,$ensFilms[$i]);
   }
?>
</TABLE>

