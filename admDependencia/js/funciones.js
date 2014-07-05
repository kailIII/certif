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

function guardarDatos(){
    var divResultado = document.getElementById('divResultado');
    var orden = document.getElementById('orden').value;
    
    var duracion = document.getElementById('duracion').value;
    
    var dependencia = document.getElementById('dependencia').value;

    document.getElementById('dependencia').style.border = "2px solid #bdc3c7";
    if(dependencia === ''){
        document.getElementById('dependencia').style.border = "2px solid red";
        alert('Debe ingresar una dependencia.');
        return false;
    }
    
    ajax=objetoAjax();
    //usando del medoto POST archivo que realizará la operacion
    ajax.open("POST", "guardarDependencia.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState===1) {
//            divResultado.innerHTML= '<center><img src="../imag1es/cargando.gif"><br/>Guardando los datos...</center>';
        } else if (ajax.readyState===4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText;
        }
    };
    //muy importante este encabezado ya que hacemos uso de un formulario
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores
    alert("dependencia="+dependencia
            +"&duracion="+duracion
            +"&orden="+orden);
    ajax.send("dependencia="+dependencia
            +"&duracion="+duracion
            +"&orden="+orden);
}

function soloNumeros(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
//comprobamos si se encuentra en el rango
    if((keynum>46 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==46)){
        return true;
    } else {
        return false;
    }
}