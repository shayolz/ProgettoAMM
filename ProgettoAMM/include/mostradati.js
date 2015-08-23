var myRequest = null;

function CreateXmlHttpReq(handler) {
  var xmlhttp = null;
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = handler;
  return xmlhttp;
}

function myHandler() {
    if (myRequest.readyState == 4 && myRequest.status == 200) {
        alert(myRequest.responseText);
    }
}

function mostradati() {
    myRequest = CreateXmlHttpReq(myHandler);
    myRequest.open("GET","./pages/mostradati.php");
    myRequest.send(null);
}