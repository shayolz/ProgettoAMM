<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginredirect.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>

<!-- Middle part -->
<table class='templatetable' align='center' width="90%">
   <tr align='center'>
      <td>
         <center>
            <table>
               <tr>
                  <td>
                     <h3>Inserisci le credenziali per accedere al sistema</h3>
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
                  </td>
               </tr>
            </table>
         </center>
      </td>
   </tr>
</table>
<br>
<!-- Footer part -->
<?php include 'template/templateFOOTER.php';?>

<?php   
// Se il login e' errato allora interviene il javascript con un messaggio di warning
// logincode.php rimanda a msg loginfailed

if (!empty($_GET) && $_GET['msg'] == "loginfailed") {
   echo '<script language=javascript>loginFailed()</script>';
}

?>
