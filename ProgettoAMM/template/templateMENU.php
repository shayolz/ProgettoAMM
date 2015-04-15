<?php
echo "<h2>Menu:</h2> <br>";

if ($_SESSION["admin"]) {
    echo "Logged as: <span class=dec3>Amministratore</span>. <br>";
    echo "1. <a href='./inserisci.php'>Inserire nuovo prodotto</a> <br>";
    echo "2. <a href='./rimuovi.php'>Rimuovi prodotto dal sistema</a> <br>";
} else {
    echo "Logged as: <span class=dec3>Operatore</span>. <br>";
    echo "1. <a href='./inserisci.php'><span style='text-decoration: line-through;'>Inserire nuovo prodotto</span></a> <br>";
    echo "2. <a href='./rimuovi.php'><span style='text-decoration: line-through;'>Rimuovi prodotto dal sistema</span></a> <br>";
}

$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
?>

3. <a href="./mappa.php">Collocazione prodotto</a> <br>
4. <a href="./totaleprodotti.php">Totale prodotti</a> <br>
5. <a href="./contatta.php">Contatta staff</a> <br>
6. <a href="./documentazione.php">Documentazione (Cosa fa?)</a> <br>
7. <a href="./logout.php">Logout</a> <br>
