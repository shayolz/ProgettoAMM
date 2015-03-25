<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php include "loginredirect.php"; ?>
<!-- TOP part -->
<?php include 'template/templateTOP.php'; ?>

<br>

<div class="tabella">
    <div class="rigatr">
        <div class="border">
            <h3><div class="scrittaLOGO">Inserisci le credenziali per accedere al sistema</div></h3>
            <span class="dec1">Amministratore</span>: Username: amministratore, password: prova<br>
            <span class="dec1">Operatore</span>: Username: operatore, password: prova <br>
            <form id="login" action="logincode.php" method="post">
                <fieldset id="inputs">
                    <input id="username" name="username" type="text" placeholder="Username" autofocus required>
                    <input id="password" name="password" type="password" placeholder="Password" required>
                </fieldset>
                <fieldset id="actions">
                    <input type="submit" id="submit" value="Collegati">
                </fieldset>
            </form>

            <!-- documentazione -->
            <a href="./documentazione.php"><div id='scrittaDOCUMENTAZIONE'>Cosa fa il progetto (Non e` necessario il login)</div></a>
        </div> 
    </div>  
</div> 

<br>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php'; ?>

<?php
// Se il login e' errato allora interviene il javascript con un messaggio di warning
// logincode.php rimanda a msg loginfailed

if (!empty($_GET) && $_GET['msg'] == "loginfailed") {
    echo '<script language=javascript>loginFailed()</script>';
}
?>