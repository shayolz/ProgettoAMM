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

// variabili
$totali = 0;
$totali1 = 0;

// query per selezionare il componente scelta dall-utente
$query=mysql_query("SELECT * FROM componenti_elettronici WHERE nome='{$_POST['campo11']}'");

// calcolo componenti TOTALI selezionati dall`untente
while ($res=mysql_fetch_array($query))
{
	$totali=$totali+$res['quantita'];
}

// query selezionare tutti i componenti elettronici
$query1=mysql_query("SELECT * FROM componenti_elettronici");

// calcolo componenti TOTALI nell`intero magazzino
while ($res2=mysql_fetch_array($query1))
{
	$totali1=$totali1+$res2['quantita'];
}

// printo risultati
echo "Numero totale di componenti nel magazzino: $totali1<br>";
echo "Numero totale di '{$_POST['campo11']}' nel magazzino: $totali";

// chiudo connessione con il DB
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
