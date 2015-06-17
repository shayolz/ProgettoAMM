<?php
echo "<h2>Menu:</h2> <br>";

echo ''.$utente->getAdmin();

if ($utente->getAdmin() == 1) {
    echo "Logged as: <span class=dec3>Amministratore</span>. <br>";
    echo "1. <a href='./index.php?page=inserisci'>Inserire nuovo prodotto</a> <br>";
    echo "2. <a href='./index.php?page=rimuovi'>Rimuovi prodotto dal sistema</a> <br>";
} else {
    echo "Logged as: <span class=dec3>Operatore</span>. <br>";
    echo "1. <a href='./index.php?page=inserisci'><span style='text-decoration: line-through;'>Inserire nuovo prodotto</span></a> <br>";
    echo "2. <a href='./index.php?page=rimuovi'><span style='text-decoration: line-through;'>Rimuovi prodotto dal sistema</span></a> <br>";
}

$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
?>

3. <a href="./index.php?page=mappa">Collocazione prodotto</a> <br>
4. <a href="./index.php?page=totaleprodotti">Totale prodotti</a> <br>
5. <a href="./index.php?page=contatta">Contatta staff</a> <br>
6. <a href="./index.php?page=documentazione">Documentazione (Cosa fa?)</a> <br>
7. <a href="./index.php?page=logout">Logout</a> <br>
