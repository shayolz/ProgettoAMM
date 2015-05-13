/*
 * Funzione Modulo() per il check del valore nell'inserimento di nuovi componenti nel magazzino
 */
function Modulo() {
    var x = document.forms["myForm"]["campo4"].value;

    // Controllo se ha lasciato vuoto e inserito 0
    if (x == null || x == "" || x == "0") {
        alert("Campo quantita' non puo' essere vuoto o uguale a 0!");
        return false;
    }

    // Controllo se ha inserito un numero
    if (isNaN(x)) {
        alert("Devi inserire un numero nel campo quantita'!");
        return false;
    }

    // Return true se il valore va bene
    return true;
}

function loginFailed() {
    alert("Login errato, riprova!");
}

function emailErrata() {
    alert("Email non corretta, riprova!");
}