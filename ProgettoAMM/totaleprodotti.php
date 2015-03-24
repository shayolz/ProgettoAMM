<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
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
                    
<h3>Totale prodotti:</h3>
Seleziona il componente per vedere quanti ne sono disponibili nel magazzino:<br><br>

<form method="post" action="totaleprodotticode.php">
      <select size="1" name="campo11">
    <option>Condensatore</option>
    <option>Resistenza</option>
    <option>Diodo</option>
    <option>Interruttore</option>
    <option>Transistor</option>
    <option>Fusibile</option>
  </select><br>
  
<INPUT TYPE="submit" VALUE="Mostra">
  </form>

</div>
        </div>
            </div>
        </div>

<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
