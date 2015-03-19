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
<h3>Seleziona componente:</h3>
Seleziona il componente che verrà mostrato all'interno del magazzino:<br><br>

<form method="post" action="mappacode.php">
      <select size="1" name="campo10">
    <option>Condensatore</option>
    <option>Resistenza</option>
    <option>Diodo</option>
    <option>Interruttore</option>
    <option>Transistor</option>
    <option>Fusibile</option>
  </select><br>
  
<INPUT TYPE="submit" VALUE="Mostra nella mappa">
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
