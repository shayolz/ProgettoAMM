<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == filter_input(INPUT_SERVER, 'SCRIPT_FILENAME', FILTER_SANITIZE_STRING)) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
<?php
include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<?php include "./include/loginsuccess.php"; ?>
<!-- TOP part -->
<?php
$top = $vd->getTopFile();
require "$top";
?>

<!--tabella css -->  
<div class="tabellapiccola">
    <div class="rigatr">
        <div class="colonnatd25"><div class="border"> 

                <!-- Menu part -->
                <?php
                $menu = $vd->getMenuFile();
                require "$menu";
                ?> 

            </div></div>

        <div class="colonnatd75"><div class="border"> 

                <?php
                echo "<h2>Menu:</h2> <br>";

                echo "(Solo gli amministratori possono leggere)<br> <A HREF='index.php?page=contattaleggi'> Clicca qui per leggere i messaggi.</a> <br>";
                ?>


                <!--form part, javascript Modulo() controlla se i dati inseriti sono validi -->
                <h3>Invia un messaggio all'amministratore:</h3>
                Compila questo form per inviare un messaggio direttamente agli amministratori.<br><br>
                <form onsubmit="return Modulo()" name="myForm" method="post" action="index.php?page=contattacode">
                    <span class="dec2">Nome</span>
                    <INPUT TYPE="text" NAME="campo01">
                    <br>
                    <span class="dec2">Testo</span>
                    <INPUT TYPE="text" NAME="campo02" size="40" maxlength="200" >
                    <br>
                    <span class="dec2">Email</span>
                    <INPUT TYPE="text" NAME="campo03">
                    <br>

                    <INPUT TYPE="submit" id="checkimput" value="Invia">
                </form>

            </div>
        </div>
    </div>
</div>
<br>

<?php
// Se il login e' errato allora interviene il javascript con un messaggio di warning
// logincode.php rimanda a msg loginfailed

if (!empty(filter_input_array(INPUT_GET)) && isset($_GET['msg']) && filter_input(INPUT_GET, 'msg') == "emailerrata") {
    echo '<script language=javascript>emailErrata()</script>';
}
?>

<!-- Footer part -->
<?php
$footer = $vd->getFooterFile();
require "$footer";
