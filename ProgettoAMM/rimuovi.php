<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
<?php include "loginprivileges.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>

           <!--tabella css -->  
    <div class="tabellapiccola">
        <div class="rigatr">

            <div class="colonnatd25"><div class="border"> 
<!--MENU part -->
<?php include 'template/templateMENU.php';?>

</div></div>
     
            <div class="colonnatd75"><div class="border"> 
<!--form part, javascript Modulo() controlla se i dati inseriti sono validi -->
<h3>Compila il form:</h3>
Seleziona il componente che vuoi rimuovere dal magazzino.<br>
(Verra' mostrata la lista di tutti i componenti selezionati)<br><br>
<form onsubmit="return Modulo()" name="myForm" method="post" action="rimuovicode.php">
  <span class="dec2">Nome</span>
    <select size="1" name="campo1">
    <option>Condensatore</option>
    <option>Resistenza</option>
    <option>Diodo</option>
    <option>Interruttore</option>
    <option>Transistor</option>
    <option>Fusibile</option>
  </select>
  <br>
<INPUT TYPE="submit" id="checkimput" value="Mostra lista">
  </form>
</div>
        </div>
            </div>
        </div>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
