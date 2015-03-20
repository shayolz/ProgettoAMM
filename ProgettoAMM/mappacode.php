<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
<html>
<head>
<body bgcolor="#000000" text="lime" link="#009933" vlink="#009933" padding="0" leftmargin="0">
<TITLE>Mappa Magazzino</TITLE>
</head>
<?php

// includo i file necessari a collegarmi al db con relativo script di accesso
include "./include/config.php";

echo "<div id='mappa'><img src='./images/map.jpg'></div>";

// query per selezionare l`oggetto richiesto dall-utente
$query=mysql_query("SELECT * FROM componenti_elettronici WHERE nome='{$_POST['campo10']}'");

$posizionescritta = 50;

while ($res=mysql_fetch_array($query))
{
        // x e y prendono i valori salvati nel DB tramide inseriscicode.php
	$x=$res['posizionescaffalex'];
	$y=$res['posizionescaffaley'];

        // Mostra un pallino dove e` collocato il prodotto da noi inserito
	echo "<div style=\"position:absolute;top:".$y."px;left:".$x."px\"><img src='./images/pallino.png' title='Quantita $res[quantita], id $res[id]'></div><center>";
        
        // per la posizione delle scritte a destra della mappa, ogni volta che ne trova una scala di 20 in basso
        $posizionescritta = $posizionescritta+20;

echo "<div style=position:absolute;top:".$posizionescritta."px;left:420px>ID: $res[id], reparto: $res[reparto], sezione: $res[sezione], quantita: $res[quantita]</div><br>";
}

// scritte
echo "<div style=position:absolute;top:0px;left:420px>Torna alla home page -> <html> <a href=./accesso.php>Click here</a></div>";
echo "<div style=position:absolute;top:20px;left:420px>(Lasciare il cursore sui pallini verdi per maggiori informazioni)</div>";

// chiudiamo la connessione con il DB
mysql_close();
?>

</body>
</html>
