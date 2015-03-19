<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
<?php include "loginprivileges.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>

<table class='templatetable' align="center" width="90%">
<tr><td>
<center>
<table>
<tr>
<td>

<!--MENU part -->
<?php include 'template/templateMENU.php';?>

</td>
<td>
<!--form part, javascript Modulo() controlla se i dati inseriti sono validi -->
<h3>Compila il form:</h3>
Inserisci i dati che verranno salvati nel database, il/i componente/i verranno registrati nel sistema.<br><br>
<form onsubmit="return Modulo()" name="myForm" method="post" action="inseriscicode.php">
  Nome
    <select size="1" name="campo1">
    <option>Condensatore</option>
    <option>Resistenza</option>
    <option>Diodo</option>
    <option>Interruttore</option>
    <option>Transistor</option>
    <option>Fusibile</option>
  </select>
  <br>
  Reparto
  <select size="1" name="campo2">
    <option>A</option>
    <option>B</option>
    <option>C</option>
  </select>
  <br>
  Sezione
  <select size="1" name="campo3">
    <option>1</option>
    <option>2</option>
    <option>3</option>
  </select>
<br>
  Quantita
<INPUT TYPE="text" NAME="campo4">
<br>

<INPUT TYPE="submit" id="checkimput" value="Inserisci">
  </form>

</td>
</tr>
</table>
</center>


</td></tr>
</table>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
