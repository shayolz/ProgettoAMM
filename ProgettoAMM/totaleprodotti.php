<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>
<table class='templatetable' align="center" width="90%">
<tr align='center'><td>
<center>
<table>
<tr>
<td>

<!--MENU part -->
<?php include 'template/templateMENU.php';?>

</td>
<td>
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

</td>
</tr>
</table>
</center>


</td></tr>
</table>
<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>
