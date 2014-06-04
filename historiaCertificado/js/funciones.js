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

function busquedaExpediente(expediente){
    if(expediente.indexOf('/')!==-1){
        expediente = expediente.split('/');
    }

    var divResultado = document.getElementById('divResultado');
    divResultado.innerHTML = '<center><img src="../images/todo/preload.GIF"><br/>Actualizando los datos...</center>';
    ajax=objetoAjax();
    ajax.open("POST", "busqueda.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
            divResultado.innerHTML = '<center><img src="../images/todo/preload.GIF"><br/>Actualizando los datos...</center>';
        } else if (ajax.readyState===4) {
            divResultado.innerHTML = ajax.responseText;
//            if(document.getElementById('h_08').value === document.getElementById('ultimo').value){
            if(document.getElementById('dependencia').value === document.getElementById('h_08').value){
                alert ('El expediente no ha sufrido movimientos.');
            } else if(document.getElementById('dependencia').value !== document.getElementById('h_08').value){
                document.getElementById('comen').innerHTML = document.getElementById('h_05').value;
                document.getElementById('depen').innerHTML = document.getElementById('h_08').value;
                var f = new Date();
                var fecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
                fecha = fecha.split('/');
                if(fecha[0].length === 1){
                    fecha[0] = '0'+fecha[0];
                }
                if(fecha[1].length === 1){
                    fecha[1] = '0'+fecha[1];
                }
                document.getElementById('fecha').innerHTML = fecha[2]+"-"+fecha[1]+"-"+fecha[0];
                document.getElementById('actual').style.display = '';
            }
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    
    ajax.send("expediente="+expediente[0]
            +"&ano="+expediente[1]);
}

function decimeElMes(mes) {
    var month = new Array();
    month[0] = "";
    month[1] = "Ene";
    month[2] = "Feb";
    month[3] = "Mar";
    month[4] = "Abr";
    month[5] = "May";
    month[6] = "Jun";
    month[7] = "jul";
    month[8] = "Ago";
    month[9] = "Sep";
    month[10] = "Oct";
    month[11] = "Nov";
    month[12] = "Dic";
    return month[mes];
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

function habilita(id){
    alert(id);
}

function guardarDatos(){
    /* Busco los datos relacionados con el historial del expediente. */
    var comen = document.getElementById('comen').innerHTML;
    var depen = document.getElementById('depen').innerHTML;
    var fecha = document.getElementById('fecha').innerHTML;
    var idexp = document.getElementById('idexpe').value;
    var divResultado = document.getElementById('divResultado');

    /* Busco los datos que se grabaran en la tabla vialidad. */
    var identificador = document.getElementById('h_01').value;
    var tipotramite = document.getElementById('h_02').value;
    var tema = document.getElementById('h_03').value;
    var fechaalta = document.getElementById('h_04').value;
    var fechaalta_ = fechaalta.split('/');
    fechaalta = fechaalta_[2]+'-'+fechaalta_[1]+'-'+fechaalta_[0];
    var extracto = document.getElementById('h_05').value;
    var estado = document.getElementById('h_06').value;
    var organismoa = document.getElementById('h_07').value;
    var dependenciaa = document.getElementById('h_08').value;
    var organismod = document.getElementById('h_09').value;
    var dependenciad = document.getElementById('h_10').value;
    var conformado = document.getElementById('h_11').value;
    var vialidad = "&identificador="+identificador+"&tipotramite="+tipotramite
            +"&tema="+tema+"&fechaalta="+fechaalta
            +"&extracto="+extracto+"&estado="+estado
            +"&organismoa="+organismoa+"&dependenciaa="+dependenciaa
            +"&organismod="+organismod+"&dependenciad="+dependenciad
            +"&conformado="+conformado;
    /* Fin de la recoleccion de los datos. */
    
    ajax=objetoAjax();
    //usando del medoto POST archivo que realizará la operacion
    ajax.open("POST", "guardarDatos.php" ,true);
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
    ajax.send("idexpediente="+idexp
            +"&fecha="+fecha
            +"&dependencia="+depen
            +"&comentario="+comen
            +vialidad);
}