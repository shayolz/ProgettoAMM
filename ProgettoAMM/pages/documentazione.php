<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
<?php
include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<!-- TOP part -->
<?php
$top = $vd->getTopFile();
require "$top";
?>
<!--tabella css -->          
<div class="tabella">
    <div class="rigatr">
        <!-- Cosa fa il progetto -->
        <div id='scrittaCAP'>Cosa fa il progetto</div>
        <div id='scrittaDESC'>Ho realizzato un semplice progetto per la gestione  di componenti elettronici all'interno di un piccolo magazzino.
            Il magazzino e' diviso in tre reparti (A,B,C) divisi a loro volta in  tre sezioni (1,2,3) quindi per un totale di nove slot.
            L`idea e` quella che gli amministratori possano inserire e rimuovere i componenti all`interno del sistema. 
            Mentre gli operatori possano solo interrogare il database, controllando quanti sono i componenti totali e vedere dove sono collocati all`interno del magazzino. </div>
        <br>            

        <!-- Da chi e` utilizzato il sistema -->
        <div id='scrittaCAP'>Da chi e` utilizzato il sistema</div>
        <div id='scrittaDESC'>Il sito e` rivolto a un Team di un azienza, quindi non a un pubblico vario. 
            Ci sono due utenti, amministratore e operatore (Che sono presenti nel database). L`utente amministratore ha la possibilita' di inserire e rimuovere oggetti  nuovi all'interno del magazzino. 
            L'oggetto all'interno di quel reporto-sezione  verra' collocato in modo randomico. (Per evitare che tutti gli  oggetti vengano mostrati nello stesso punto)</div>
        <br>  

        <!-- Struttura progetto -->
        <div id='scrittaCAP'>Struttura progetto</div>
        <div id='scrittaDESC'>Ho utilizzato i linguaggi HTML e CSS per il template, PHP per le sessioni e le interrogazioni al database e il javascript per il check degli input.
            Per gli input ho messo dei check sia lato HTML5 e sia lato javascript per controllare se l`inserimento del dato e` corretto. (Per esempio nel campo quantita' va accettato solamente un numero).
            Se un utente non effettua l`accesso e prova a connettersi direttamente ai file .php viene reindirizzato nella pagina di login. 
            Se un utente ha gia' effettuato l`accesso e prova ad accedere alla pagina di login, viene reindirizzato alla pagina di accesso.php.
            Ho diviso il progetto in tre file, TOP-MENU-BOTTOM per il Template e li includo nei file in cui serve.</div>
        <br>  

        <!-- Torna al login -->
        <a href="./index.php"><div id='scrittaLOGINBACK'>Torna al login</div></a>                  
    </div>
</div>
<br>
<!-- Footer part -->
<?php
$footer = $vd->getFooterFile();
require "$footer";
?>
