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
    var idobra = document.getElementById('nombreobra').value;
    
    var tipocertf = document.getElementById('tipocertf').value;
    var nrocert  = document.getElementById('nrocert').value;

    var periodo = document.getElementById('periodo').value;
    var fechafirma = document.getElementById('fechafirma').value;
    
//    var importeb = document.getElementById('importeb').value;
    var dnvCertificado = document.getElementById("dnvCertificado").value;

    var dpvExpediente = document.getElementById("dpvExpediente").value;
    var dnvExpediente = document.getElementById("dnvExpediente").value;
    
    var importeExpediente = document.getElementById("importeExpediente").value;
    var vencimientoExpediente = document.getElementById("vencimientoExpediente").value;
    
    var cedidoExpediente = document.getElementById("cedidoExpediente").value;
    var comentarioExpediente = document.getElementById("comentarioExpediente").value;
    
    document.getElementById('nombreobra').style.border = "2px solid #bdc3c7";
    if(nombreobra === ''){
        document.getElementById('nombreobra').style.border = "2px solid red";
        alert('Debe ingresar un nombre de obra.');
        return false;
    }
    
    ajax=objetoAjax();
    //usando del medoto POST archivo que realizará la operacion
    ajax.open("POST", "guardarCertificado.php" ,true);
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

    ajax.send("tipocertf="+tipocertf
            +"&nrocert="+nrocert
            +"&periodo="+periodo
            +"&fechafirma="+fechafirma
//            +"&importeb="+importeb
            +"&dnvCertificado="+dnvCertificado
            +"&dpvExpediente="+dpvExpediente
            +"&dnvExpediente="+dnvExpediente
            +"&importeExpediente="+importeExpediente
            +"&vencimientoExpediente="+vencimientoExpediente
            +"&cedidoExpediente="+cedidoExpediente
            +"&comentarioExpediente="+comentarioExpediente
            +"&idobra="+idobra);
}

function verCertificado(){
    document.getElementById("certificados").style.display="";
    document.getElementById("muestraCertificado").style.background = "#1abc9c";
    document.getElementById("muestraExpedientes").style.background = "#bdc3c7";
    document.getElementById("expedientes").style.display="none";
}
function OcultarCertificado(){    
    document.getElementById("certificados").style.display = "none";
    document.getElementById("expedientes").style.display = "";
    document.getElementById("muestraExpedientes").style.background = "#1abc9c";
    document.getElementById("muestraCertificado").style.background = "#bdc3c7";
}

function acomodaExpediente(){
    var expediente = document.getElementById('dnvExpediente').value;
    
    if(expediente.indexOf('/')!==-1){
        expediente = expediente.split('/');

        switch (expediente[1].length){
            case 1:
                expediente[1] = '200' + expediente[1];
                break;
            case 2:
                expediente[1] = '20' + expediente[1];
                break;
            case 3:
                expediente[1] = '2' + expediente[1];
                break;
        }

        switch (expediente[0].length){
            case 0:
                expediente[0] = '0000000' + expediente[0];
                break;
            case 1:
                expediente[0] = '000000' + expediente[0];
                break;
            case 2:
                expediente[0] = '00000' + expediente[0];
                break;
            case 3:
                expediente[0] = '0000' + expediente[0];
                break;
            case 4:
                expediente[0] = '000' + expediente[0];
                break;
            case 5:
                expediente[0] = '00' + expediente[0];
                break;
            case 6:
                expediente[0] = '0' + expediente[0];
                break;
            case 7 :
                break;
            default :
                expediente[0] = '0000000';
        }
    }
    
    document.getElementById('dnvExpediente').value = expediente[0]+'/'+expediente[1];
}

function busquedaExpediente(){
    var expediente = document.getElementById('dnvExpediente').value;

    var divResultado = document.getElementById('divResultado');
    ajax=objetoAjax();
    ajax.open("POST", "busqueda.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState===1) {
//            divResultado.innerHTML= '<center><img src="../imag1es/cargando.gif"><br/>Guardando los datos...</center>';
        } else if (ajax.readyState===4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText;
            document.getElementById('dnvExpediente').value = document.getElementById('h_01').value;
//            document.getElementById('').value = document.getElementById('h_02').value;
//            document.getElementById('').value = document.getElementById('h_03').value;
//            document.getElementById('mesExpediente').value = document.getElementById('h_04').value;
            document.getElementById('comentarioExpediente').value = document.getElementById('h_05').value;
//            document.getElementById('').value = document.getElementById('h_06').value;
//            document.getElementById('').value = document.getElementById('h_07').value;
            document.getElementById('dependenciaExpediente').value = document.getElementById('h_08').value;
//            document.getElementById('').value = document.getElementById('h_09').value;
//            document.getElementById('').value = document.getElementById('h_10').value;
//            document.getElementById('').value = document.getElementById('h_11').value;
            
            var mes = document.getElementById('h_04').value;
            var mes = mes.split('/');
            
            document.getElementById('mesExpediente').value = decimeElMes(mes[1])+'-'+mes[2];
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