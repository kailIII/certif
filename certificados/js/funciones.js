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
    var certificado = "";

    document.getElementById('nombreobra').style.border = "2px solid #bdc3c7";
    var nombreobra = document.getElementById('nombreobra').value;
    
    if(nombreobra === ''){
        document.getElementById('nombreobra').style.border = "2px solid red";
        alert('Debe ingresar un nombre de obra.');
        return false;
    }
    
    var divResultado = document.getElementById('divResultado');

    if(document.getElementById("certificados").style.display !== "none"){
        var archivo = document.getElementById('archivo');
        archivo = archivo.files[0];

    //    var identificador = document.getElementById('identificador').value;
        var tipocertf = document.getElementById('tipocertf').value;

        var nrocert  = document.getElementById('nrocert').value;
        var periodo = document.getElementById('periodo').value;

        var fechafirma = document.getElementById('fechafirma').value;
        var participacion = document.getElementById('participacion').value;

        var importeb = document.getElementById('importeb').value;
        var importer = document.getElementById('importer').value;

        var fondoamp = document.getElementById('fondoamp').value;
        var anticipo = document.getElementById('anticipo').value;

        var otros = document.getElementById('otros').value;
        var acobrar = document.getElementById('acobrar').value;

        var comentarios = document.getElementById('comentarios').value;

        var limit = 1048576*2,xhr;
        console.log(limit);
        if( archivo ){
            if( archivo.size < limit ){
                xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('load',function(e){
                }, false);
                xhr.upload.addEventListener('error',function(e){
                    divResultado.innerHTML = "<h1>Ocurrio Un Error</h1>";
                }, false);
                xhr.open('POST','subirArchivo.php');
                xhr.setRequestHeader("Cache-Control", "no-cache");
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.setRequestHeader("X-File-Name", archivo.name);
                xhr.send(archivo);
            } else {
                alert('El archivo es mayor que 2MB!');
            }
        }
        certificado = "&tipocertf="+tipocertf
            +"&nrocert="+nrocert
            +"&periodo="+periodo
            +"&fechafirma="+fechafirma
            +"&participacion="+participacion
            +"&importeb="+importeb
            +"&importer="+importer
            +"&fondoamp="+fondoamp
            +"&anticipo="+anticipo
            +"&otros="+otros
            +"&acobrar="+acobrar
            +"&comentarios="+comentarios;
    }
    
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
    
    var dpvCertificado = document.getElementById('dpvCertificado').value;
    var dnvCertificado = document.getElementById("dnvCertificado").value;
    var dpvExpediente = document.getElementById("dpvExpediente").value;
    var dnvExpediente = document.getElementById("dnvExpediente").value;
    var mesExpediente = document.getElementById("mesExpediente").value;
    var dependenciaExpediente = document.getElementById("dependenciaExpediente").value;
    var importeExpediente = document.getElementById("importeExpediente").value;
    var vencimientoExpediente = document.getElementById("vencimientoExpediente").value;
    var cedidoExpediente = document.getElementById("cedidoExpediente").value;
    var comentarioExpediente = document.getElementById("comentarioExpediente").value;

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

    ajax.send("dpvCertificado="+dpvCertificado
            +"&dnvCertificado="+dnvCertificado
            +"&dpvExpediente="+dpvExpediente
            +"&dnvExpediente="+dnvExpediente
            +"&mesExpediente="+mesExpediente
            +"&dependenciaExpediente="+dependenciaExpediente
            +"&importeExpediente="+importeExpediente
            +"&vencimientoExpediente="+vencimientoExpediente
            +"&cedidoExpediente="+cedidoExpediente
            +"&comentarioExpediente="+comentarioExpediente
            +"&nombreobra="+nombreobra
            +certificado+vialidad);
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
function busquedaExpediente(){
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