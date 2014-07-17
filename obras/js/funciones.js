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
    var identificador = document.getElementById('identificador').value;
    var denominacion = document.getElementById('denominacion').value;
    var comitente = document.getElementById('comitente').value;
    var fecha = document.getElementById('fecha').value;
    var expediente = document.getElementById('expediente').value;
    
    var divResultado = document.getElementById('resultado');
    
    ajax=objetoAjax();
    ajax.open("POST", "guardarObra.php" ,true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState === 1) {
            divResultado.innerHTML= '<img src="../images/cargando.gif"><br/>Guardando los datos...';
        } else if (ajax.readyState === 4) {
            divResultado.innerHTML = ajax.responseText;
        }
    };
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    ajax.send("identificador="+identificador+"&denominacion="+denominacion
        +"&comitente="+comitente+"&expediente="+expediente+"&fecha="+fecha);
}

function soloFecha(evt){
    //asignamos el valor de la tecla a keynum
    if(window.event){// IE
    keynum = evt.keyCode;
    }else{ // otro navegador
    keynum = evt.which;
    }
    if((keynum>47 && keynum<58)||(keynum===0)||(keynum===13)||(keynum===8)||(keynum===47)){
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