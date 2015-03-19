<?php

echo "<h2>Menu:</h2> <br>";

if ($_SESSION["admin"])
{
  echo "Logged as: <b>Amministratore</b>. <br>";
  echo "1. <a href='./inserisci.php'>Inserire nuovo prodotto</a> <br>";
}
else
{
  echo "Logged as: <b>Operatore<b>. <br>";
  echo "1. <a href='./inserisci.php'><span style='text-decoration: line-through;'>Inserire nuovo prodotto</span></a> <br>";
}
 
$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
?>

2. <a href="./mappa.php">Collocazione prodotto</a> <br>
3. <a href="./totaleprodotti.php">Totale prodotti</a> <br>
4. <a href="./documentazione.php">Documentazione (Cosa fa?)</a> <br>
4. <a href="./logout.php">Logout</a> <br>
