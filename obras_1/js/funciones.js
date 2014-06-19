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
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function guardarDatos(){
//    alert ('Tincho');
    var archivo = document.getElementById('archivo');
    archivo = archivo.files[0];
    
    var identificador = document.getElementById('identificador').value;
    var denominacion = document.getElementById('denominacion').value;
    var ubicacion  = document.getElementById('ubicacion').value;
    var comitente = document.getElementById('comitente').value;
    var tipoobra = document.getElementById('tipoobra').value;
    var observacion = document.getElementById('observacion').value;
    var longitud = document.getElementById('longitud').value;
    var terraplen = document.getElementById('terraplen').value;
    var basenobitu = document.getElementById('basenobitu').value;
    var banquina = document.getElementById('banquina').value;
    var tratatriple = document.getElementById('tratatriple').value;
    var hormigon = document.getElementById('hormigon').value;
    var recubrimiento = document.getElementById('recubrimiento').value;
    var reforestacion = document.getElementById('reforestacion').value;
    
    var fechalic = document.getElementById('fechalic').value;
    var montoco = document.getElementById('montoco').value;
    var replanteo = document.getElementById('replanteo').value;
    var financiada = document.getElementById('financiada').value;
    var fechato = document.getElementById('fechato').value;
    var fechacont = document.getElementById('fechacont').value;
    var montocf = document.getElementById('montocf').value;
    var plazocf = document.getElementById('plazocf').value;
    var participacion = document.getElementById('participacion').value;
    var fechatf = document.getElementById('fechatf').value;
    var personeria = document.getElementById('personeria').value;
    var ute = document.getElementById('ute').value;
    var fechainicio = document.getElementById('fechainicio').value;
    var comentarios = document.getElementById('comentarios').value;
    
    divResultado = document.getElementById('resultado');
    
    fechalic = fechaInvertir(fechalic);
    replanteo = fechaInvertir(replanteo);
    fechato = fechaInvertir(fechato);
    fechacont = fechaInvertir(fechacont);
    plazocf = fechaInvertir(plazocf);
    fechatf = fechaInvertir(fechatf);
    fechainicio = fechaInvertir(fechainicio);
    
    var limit = 1048576*2,xhr;
    console.log(limit);
    if( archivo ){
        if( archivo.size < limit ){
            xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('load',function(e){
                ajax=objetoAjax();
                //usando del medoto POST
                //archivo que realizará la operacion
                ajax.open("POST", "guardarObra.php" ,true);
                ajax.onreadystatechange=function() {
                    if (ajax.readyState==1) {
                        divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
                    } else if (ajax.readyState==4) {
                        //mostrar los nuevos registros en esta capa
                        divResultado.innerHTML = ajax.responseText;
                        document.getElementById('idOdontologia').value = document.getElementById('idOdontologiaAuxiliar').value;
                    }
                }
                //muy importante este encabezado ya que hacemos uso de un formulario
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                //enviando los valores
                ajax.send("identificador="+identificador+"&denominacion="+denominacion
                        +"&ubicacion="+ubicacion+"&comitente="+comitente+"&tipoobra="+tipoobra
                        +"&observacion="+observacion+"&longitud="+longitud+"&terraplen="+terraplen
                        +"&basenobitu="+basenobitu+"&banquina="+banquina
                        +"&tratatriple="+tratatriple+"&hormigon="+hormigon
                        +"&recubrimiento="+recubrimiento+"&reforestacion="+reforestacion
                        +"&fechalic="+fechalic+"&montoco="+montoco
                        +"&replanteo="+replanteo
                        +"&financiada="+financiada
                        +"&fechato="+fechato
                        +"&fechacont="+fechacont
                        +"&fechainicio="+fechainicio
                        +"&montocf="+montocf
                        +"&plazocf="+plazocf
                        +"&participacion="+participacion
                        +"&fechatf="+fechatf
                        +"&personeria="+personeria
                        +"&comentarios="+comentarios
                        +"&ute="+ute
                        +"&kml="+archivo.name);
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
    return true;
}

function soloFecha(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
    keynum = evt.keyCode;
    }else{ // otro navegador
    keynum = evt.which;
    }
    if((keynum>47 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==47)){
        return true;
    } else {
        return false;
    }
}

function fechaControl(valor, evento){
    var valor1 = document.getElementById(valor);
    if(window.event){// IE
        keynum = evento.keyCode;
    } else { // otro navegador
        keynum = evento.which;
    }

    if(keynum===8 && valor1.value.length === 2) {
        valor1.value = valor1.value.substring(0,1);
        return true;
    }
    
    if(keynum===8 && valor1.value.length === 5) {
        valor1.value = valor1.value.substring(0,4);
        return true;
    }
    
    if(valor1.value.length===2||valor1.value.length===5){
        valor1.value=valor1.value+"/";
    };
}
function validarFecha(fecha){
    if (fecha !=  undefined && fecha.value !=  "" ){
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){            
            fecha.style.borderColor='brown';
            fecha.focus();
            return false;
        }
        var dia  =  parseInt(fecha.value.substring(0,2),10);
        var mes  =  parseInt(fecha.value.substring(3,5),10);
        var anio =  parseInt(fecha.value.substring(6),10);        
        switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8: 
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
        case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
        default:                                 
            fecha.focus();
            fecha.style.borderColor='brown';
            return false;
    }
 
        if (dia>numDias || dia == 0){                        
	    fecha.focus();
            fecha.style.borderColor='brown';
            return false;
        }
        fecha.style.borderColor='';
        validaMayorQue(fecha, anio, mes, dia);
        return true;
    }
}

function soloNumeros(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
        keynum = evt.keyCode;
    } else { // otro navegador
        keynum = evt.which;
    }
//comprobamos si se encuentra en el rango
    if((keynum>47 && keynum<58)||(keynum==0)||(keynum==13)||(keynum==8)||(keynum==46)){
        return true;
    } else {
        return false;
    }
}
function fechaInvertir(fecha){
//    fecha = document.getElementById(fecha);
    if (fecha.indexOf('/') > 0){
        var dia  =  parseInt(fecha.substring(0,2),10);
        var mes  =  parseInt(fecha.substring(3,5),10);
        var anio =  parseInt(fecha.substring(6),10);
        if(dia<10) dia = '0'+dia;
        if(mes<10) mes = '0'+mes;
        return anio+"-"+mes+"-"+dia;
    }
    if (fecha.indexOf('-') > 0){
        var anio  =  parseInt(fecha.substring(0,4),10);
        var mes  =  parseInt(fecha.substring(5,8),10);
        var dia =  parseInt(fecha.substring(9),10);
        if(dia<10) dia = '0'+dia;
        if(mes<10) mes = '0'+mes;
        return dia+"/"+mes+"/"+anio;
    }
    
}