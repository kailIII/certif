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
            divResultado.innerHTML = '<center><img src="../images/todo/preload.GIF"><br/>Guardando los datos...</center>';
        } else if (ajax.readyState===4) {
            divResultado.innerHTML = ajax.responseText;
            if(document.getElementById('h_08').value === document.getElementById('ultimo').value){
                alert ('El expediente no ha sufrido movimientos.');
            } else {
//                document.getElementById('dnvExpediente').value = document.getElementById('h_01').value;
//                document.getElementById('').value = document.getElementById('h_02').value;
//                document.getElementById('').value = document.getElementById('h_03').value;
//                document.getElementById('fecha').innerHTML = document.getElementById('h_04').value;
                document.getElementById('comen').innerHTML = document.getElementById('h_05').value;
//                document.getElementById('').value = document.getElementById('h_06').value;
//                document.getElementById('').value = document.getElementById('h_07').value;
                document.getElementById('depen').innerHTML = document.getElementById('h_08').value;
//                document.getElementById('').value = document.getElementById('h_09').value;
//                document.getElementById('').value = document.getElementById('h_10').value;
//                document.getElementById('').value = document.getElementById('h_11').value;
//                var fecha = document.getElementById('h_04').value.split('/');
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