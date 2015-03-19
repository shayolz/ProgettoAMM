<?php session_start(); ?>
<?php include "include/errorReport.php";?>
<?php include "loginsucess.php";?>
<!-- TOP part -->
<?php include 'template/templateTOP.php';?>
<table class='templatetable' align="center" width="90%">
   <tr align='center'>
      <td>
         <center>
            <table>
               <tr>
                  <td>
                     <!--MENU part -->
                     <?php include 'template/templateMENU.php';?>
                  </td>
                  <td>
                     <h4>Idea progetto</h4>
                     Avevo intenzione di realizzare un semplice progetto per la gestione  di componenti elettronici all'interno di un piccolo magazzino.<br>
                     Il magazzino e' diviso in tre reparti (A,B,C) divisi a loro volta in  tre sezioni (1,2,3) quindi per un totale di nove slot.<br>
                     L'amministratore del sistema ha la possibilità di inserire oggetti  nuovi all'interno del magazzino inserendo: nome oggetto, reparto,  sezione e quantità. L'oggetto all'interno di quel reporto-sezione  verra collogato in modo randomico. (Per evitare che tutti gli  oggetti vengano mostrati nello stesso punto)<br>
                     L'amministratore ha la possibilita' di interrogare il database e  vedere attraverso un immagine dove sono collocati eventuali  componenti con ricerca tramite nome. I componenti verranno mostrati  all'interno dell'immagine. (passando il cursore su ogni pallino ci  sara' la possibilita' anche di vedere la quantità di ogni singolo  pacco)<br>
                     <h4>TODO</h4>
                     Controlli su input<br>
                     Ottimizzazione template<br>
                     Autorizzazione amministratore e operatore.<br>
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