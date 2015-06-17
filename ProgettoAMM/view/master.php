<?php
include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<?php include "./include/loginredirect.php"; ?>
<!-- TOP part -->
<?php
$top = $vd->getTopFile();
require "$top";
?>

<br>

<div class="tabella">
    <div class="rigatr">
        <div class="border">
            <h3><div class="scrittaLOGO">Inserisci le credenziali per accedere al sistema</div></h3>
            <span class="dec1">Amministratore</span>: Username: amministratore, password: prova<br>
            <span class="dec1">Operatore</span>: Username: operatore, password: prova <br>
            <form id="login" action="index.php?page=logincode" method="post">
                <fieldset id="inputs">
                    Username:<input id="username" name="username" type="text" placeholder="Username" autofocus required> <br>
                    Password:<input id="password" name="password" type="password" placeholder="Password" required>
                </fieldset>
                <fieldset id="actions">
                    <input type="submit" id="submit" name="login"value="Login">
                </fieldset>
            </form>

            <!-- documentazione -->
            <a href="index.php?page=documentazione"><div id='scrittaDOCUMENTAZIONE'>Cosa fa il progetto (Non e` necessario il login)</div></a>
        </div> 
    </div>  
</div> 

<br>
<br>

<!-- Footer part -->
<?php
$footer = $vd->getFooterFile();
require "$footer";
?>

<?php
// Se il login e' errato allora interviene il javascript con un messaggio di warning
// logincode.php rimanda a msg loginfailed

if (isset($_GET['msg']) && $_GET['msg'] == "loginfailed") {
    echo '<script language=javascript>loginFailed()</script>';
}