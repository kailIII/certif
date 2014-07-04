function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function cambio(){
    var comitente = document.getElementById('comitente').value;
//    if(comitente === '0') {
//        document.location.href = 'index.php';
//    }
    var divResultado = document.getElementById('listado');
    
    ajax=objetoAjax();
    if(comitente === '0') {
        ajax.open("POST", "todo.php" ,true);
    } else {
        ajax.open("POST", "procesoBusqueda.php" ,true);
    }
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
//            divResultado.innerHTML= '<center><img src="../imag1es/cargando.gif"><br/>Guardando los datos...</center>';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("comitente="+comitente);
}