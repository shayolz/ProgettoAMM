<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>

    <div class="tabellapiccola">
        <div class="rigatr">

            <div class="colonnatd25"><div class="border"> 

<!--MENU part -->
<?php include 'template/templateMENU.php';?>

</div></div>
     
            <div class="colonnatd75"><div class="border"> 

<?php

// includo i file necessari a collegarmi al db con relativo script di accesso
include "./include/config.php";

// variabili
$posizionex = 0;
$posizioney = 0;
$randomValuex = rand(-50,50);
$randomValuey = rand(-50,50);

// In base al reparto e alla sezione selezionato al componente vengono dati valori x/y prestabiliti 
// e viene sommato un valore random per far si che gli oggetti poi mostrati nella mappa
// non siano tutti nello stesso punto

// Reparto A sezione 1 - 2 - 3
if ("{$_POST['campo2']}" == "A" && "{$_POST['campo3']}" == "1")
{
$posizionex=70+$randomValuex;
$posizioney= 230+$randomValuey;
}
else if ("{$_POST['campo2']}" == "A" && "{$_POST['campo3']}" == "2")
{
$posizionex=70+$randomValuex;
$posizioney= 360+$randomValuey;
}
else if ("{$_POST['campo2']}" == "A" && "{$_POST['campo3']}" == "3")
{
$posizionex=70+$randomValuex;
$posizioney= 510+$randomValuey;
}

// Reparto B sezione 1 - 2 - 3
if ("{$_POST['campo2']}" == "B" && "{$_POST['campo3']}" == "1")
{
$posizionex=210+$randomValuex;
$posizioney= 230+$randomValuey;
}
else if ("{$_POST['campo2']}" == "B" && "{$_POST['campo3']}" == "2")
{
$posizionex=210+$randomValuex;
$posizioney= 360+$randomValuey;
}
else if ("{$_POST['campo2']}" == "B" && "{$_POST['campo3']}" == "3")
{
$posizionex=210+$randomValuex;
$posizioney= 510+$randomValuey;
}

// Reparto C sezione 1 - 2 - 3
if ("{$_POST['campo2']}" == "C" && "{$_POST['campo3']}" == "1")
{
$posizionex=330+$randomValuex;
$posizioney= 230+$randomValuey;
}
else if ("{$_POST['campo2']}" == "C" && "{$_POST['campo3']}" == "2")
{
$posizionex=330+$randomValuex;
$posizioney= 360+$randomValuey;
}
else if ("{$_POST['campo2']}" == "C" && "{$_POST['campo3']}" == "3")
{
$posizionex=330+$randomValuex;
$posizioney= 510+$randomValuey;
}

// query per selezionare tutti i campi e generale l id unico
$queryselect=mysql_query("SELECT id FROM componenti_elettronici");

$ultimoId = 0;
$nuovoId = 0;

// calcolo del nuovo id unico
while ($res=mysql_fetch_array($queryselect))
{
	if($ultimoId < $res['id'])
            {
          $ultimoId=$res['id'];
          }
}

$nuovoId = $ultimoId+1;

// query per l`inserimento dei dati nel DB
$query = "INSERT INTO componenti_elettronici (id, nome,reparto,sezione,quantita,posizionescaffalex,posizionescaffaley) VALUES ('$nuovoId', '{$_POST['campo1']}', '{$_POST['campo2']}', '{$_POST['campo3']}','{$_POST['campo4']}', $posizionex, $posizioney)";

if (mysql_query ($query)){
   echo ("Inserimento riuscito!");
}
else{
   echo ("Errore nell'inserimento! Si prega di riprovare!");
}

// chiudiamo la connessione con il db
mysql_close(); 
?>

</div>
        </div>
            </div>
        </div>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
