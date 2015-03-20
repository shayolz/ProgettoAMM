<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>
<table class='templatetable' align="center" width="90%">
<tr align='center'><td>
<center>
<table>
<tr>
<td>

<!--MENU part -->
<?php include 'template/templateMENU.php';?>

</td>
<td>

<?php

// includo i file necessari a collegarmi al db con relativo script di accesso
include "./include/config.php";



// query per l`inserimento dei dati nel DB
$query = "DELETE FROM componenti_elettronici WHERE id = '{$_POST['campo4']}'";

if (mysql_query ($query)){
   echo ("Prodotto rimosso con successo dal database!");
}
else{
   echo ("Errore! Controllate se l`id esiste!");
}

// chiudiamo la connessione con il db
mysql_close(); 
?>

</td>
</tr>
</table>
</center>


</td></tr>
</table>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
