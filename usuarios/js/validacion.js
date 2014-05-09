function objetoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function modificacionUsuario() {
    //nombre y apellido
    divNom = document.getElementById('nom');
    divNom.innerHTML="";
    nombre = document.formulario.nombre.value;
    // identificacion de usuario
    divIden = document.getElementById('iden');
    divIden.innerHTML="";
    identif = document.formulario.usuarionombre.value;
    // password 1
    divP1 = document.getElementById('pass1');
    divP1.innerHTML="";
    passw1 = document.formulario.password1.value;
    // password 2
    divP2 = document.getElementById('pass2');
    divP2.innerHTML="";
    passw2 = document.formulario.password2.value;
    // ambito
    divEfec = document.getElementById('efec');
    divEfec.innerHTML="";
    efe=document.formulario.ambito[document.formulario.ambito.selectedIndex].value;
    // passwords no coinciden
    divFalta = document.getElementById('falta_dato');
    divFalta.innerHTML="";
    
    var opc=0;
    if (nombre=="")
    {divNom.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (identif=="")
    {divIden.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (passw1=="")
    {divP1.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (passw2=="")
    {divP2.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (efe=="")
    {divEfec.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if ((passw2!="")&&(passw2!="")&&(passw1!=passw2))
    {divFalta.innerHTML= '<br/><br/>Passwords no coinciden<br/>';return false;}

    if  (opc==1)    {
        divFalta.innerHTML= '<br/><br/>(<img src="../images/valida.jpeg">)&nbsp;Dato Requerido';
        return false;}   
    else  { 
      formulario.submit();}
}

function nuevoUsuario() {
    //dni
    var dni = document.getElementById('dni').value;
    //nombre
    var nombre = document.getElementById('nombre').value;
    //apellido
    var apellido = document.getElementById('apellido').value;
    // identificacion de usuario
    var usuarionombre = document.getElementById('usuarionombre').value;
    // password 1
    var password1 = document.getElementById('password1').value;
    // password 2
    var password2 = document.getElementById('password2').value;
    // perfil
    var perfil = document.getElementById('perfil').value;

    var divFalta = document.getElementById('falta_dato');
    divFalta.innerHTML="";

//    var opc=0;
//    if (nombre=="") {divNom.innerHTML= '*';opc=1;} else {divNom.innerHTML = '';}
//    if (apellido=="") {divApe.innerHTML= '*';opc=1;} else {divApe.innerHTML = '';}
//    if (direccion=="") {divDir.innerHTML= '*';opc=1;} else {divDir.innerHTML = '';}
//    if (identif=="") {divIden.innerHTML= '*';opc=1;} else {divIden.innerHTML = '';}
//    if (passw1=="") {divP1.innerHTML= '*';opc=1;} else {divP1.innerHTML = '';}
//    if (passw2=="") {divP2.innerHTML= '*';opc=1;} else {divP2.innerHTML = '';}
//    if (nivel!="Z" && nivel!="N" && nivel!="C") {divNiv.innerHTML= '*';opc=1;} else {divNiv.innerHTML = '';}
    if ((password1!="")&&(password2!="")&&(password1!=password2)) {divFalta.innerHTML= '<b><br/><br/>Passwords no coinciden<br/></b>';return false;}

//   if (opc==1) {
//       divFalta.innerHTML= '<br/><br/>(<img src="../images/valida.jpeg">)&nbsp;Dato Requerido';
//       return false;
//    } else {
      divResultado = document.getElementById('resultado');
      ajax=objetoAjax();
      ajax.open("POST", "alta_usuario.php" ,true);
      ajax.onreadystatechange=function() {
      if (ajax.readyState==1){
         divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
      } else if (ajax.readyState==4) {
               //mostrar los nuevos registros en esta capa
               divResultado.innerHTML = ajax.responseText;
            }
      }
      //muy importante este encabezado ya que hacemos uso de un formulario
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores
      ajax.send("dni="+dni+
              "&nombre="+nombre+
              "&apellido="+apellido+
              "&usuarionombre="+usuarionombre+
              "&password1="+password1+
              "&password2="+password2+
              "&perfil="+perfil);
      return true;
//    }
}


function modificacionClave() {
   // password actual
   var divPA = document.getElementById('passA');
   divPA.innerHTML="";
   var passwA = document.getElementById('passwordA').value;

    // password 1
    var divP1 = document.getElementById('pass1');
    divP1.innerHTML="";
    var passw1 = document.getElementById('password1').value;
    // password 2
    var divP2 = document.getElementById('pass2');
    divP2.innerHTML="";
    var passw2 = document.getElementById('password2').value;

    var ident = document.getElementById('ident').value;

    var divFalta = document.getElementById('falta_dato');
    divFalta.innerHTML="";

    var opc=0;
    if (passwA=="")
    {divPA.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (passw1=="")
    {divP1.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if (passw2=="")
    {divP2.innerHTML= '<img src="../images/valida.jpeg">';opc=1;}
    if ((passw2!="")&&(passw2!="")&&(passw1!=passw2))
    {divFalta.innerHTML= '<b><br/><br/>Las claves nuevas no coinciden<br/></b>';return false;}

    if (opc==1) {
       divFalta.innerHTML= '<br/>(<img src="../images/valida.jpeg">)&nbsp;Dato Requerido';
       return false;
    } else {
      divResultado = document.getElementById('resultado');
      ajax=objetoAjax();
      ajax.open("POST", "aut_cambio_clave.php" ,true);
      ajax.onreadystatechange=function() {
      if (ajax.readyState==1){
         divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
      } else if (ajax.readyState==4) {
               //mostrar los nuevos registros en esta capa
               divResultado.innerHTML = ajax.responseText;
            }
      }
      //muy importante este encabezado ya que hacemos uso de un formulario
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores
      ajax.send("passwordA="+passwA+"&password1="+passw1+"&password2="+passw2+"&passw2="+passw2+"&id="+ident);
       return true;
    }
}

function borrarUsuario(ident){
   var opc = confirm('Esta por bloquear un usuario');
   if (!opc) {
       return false;
    } else {
      divResultado = document.getElementById('resultado');
      ajax=objetoAjax();
      ajax.open("POST", "aut_baja_usuario.php" ,true);
      ajax.onreadystatechange=function() {
      if (ajax.readyState==1){
         divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
      } else if (ajax.readyState==4) {
               //mostrar los nuevos registros en esta capa
               divResultado.innerHTML = ajax.responseText;
            }
      }
      //muy importante este encabezado ya que hacemos uso de un formulario
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores
      ajax.send("ident="+ident);
       return true;
    }
}

function activarUsuario(ident){
   var opc = confirm('Esta por activar un usuario');
   if (!opc) {
       return false;
    } else {
      divResultado = document.getElementById('resultado');
      ajax=objetoAjax();
      ajax.open("POST", "aut_activar_usuario.php" ,true);
      ajax.onreadystatechange=function() {
      if (ajax.readyState==1){
         divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
      } else if (ajax.readyState==4) {
               //mostrar los nuevos registros en esta capa
               divResultado.innerHTML = ajax.responseText;
            }
      }
      //muy importante este encabezado ya que hacemos uso de un formulario
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores
      ajax.send("ident="+ident);
       return true;
    }
}

function editarUsuario(ident){
   divResultado = document.getElementById('contenedor');
   ajax=objetoAjax();
   ajax.open("POST", "aut_modifica_usuario_existente.php" ,true);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==1){
      divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
   } else if (ajax.readyState==4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText;
         }
   }
   //muy importante este encabezado ya que hacemos uso de un formulario
   ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   //enviando los valores
   ajax.send("ident="+ident);
      return true;
}

function especialidades(ident){
   divResultado = document.getElementById('contenedor');
   ajax=objetoAjax();
   ajax.open("POST", "aut_especialidades.php" ,true);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==1){
      divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
   } else if (ajax.readyState==4) {
            //mostrar los nuevos registros en esta capa
            divResultado.innerHTML = ajax.responseText;
         }
   }
   //muy importante este encabezado ya que hacemos uso de un formulario
   ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   //enviando los valores
   ajax.send("ident="+ident);
      return true;
}

function modificaUsuarioExistente() {
    //nombre y apellido
    var ident = document.getElementById('ident').value;
    
    var divNom = document.getElementById('nom');
    var nombre = document.formulario.nombre.value;
    // identificacion de usuario
    var divIden = document.getElementById('iden');
    var identif = document.formulario.usuarionombre.value;
    // password 1
    var divP1 = document.getElementById('pass1');
    var passw1 = document.formulario.password1.value;
    // password 2
    var divP2 = document.getElementById('pass2');
    var passw2 = document.formulario.password2.value;
    
    var nivel = document.getElementById('nivel').value;
    var divNiv = document.getElementById('divNiv');
    nivel = nivel.substr(0, 1);
    
    var divFalta = document.getElementById('falta_dato');
    divFalta.innerHTML="";

    var opc=0;
    if (nombre=="") {divNom.innerHTML= '<img src="../images/valida.jpeg">';opc=1;} else {divNom.innerHTML = '';}
    if (identif=="") {divIden.innerHTML= '<img src="../images/valida.jpeg">';opc=1;} else {divIden.innerHTML = '';}
    if (passw1=="") {divP1.innerHTML= '<img src="../images/valida.jpeg">';opc=1;} else {divP1.innerHTML = '';}
    if (passw2=="") {divP2.innerHTML= '<img src="../images/valida.jpeg">';opc=1;} else {divP2.innerHTML = '';}
    if (nivel!="Z" && nivel!="N" && nivel!="C") {divNiv.innerHTML= '<img src="../images/valida.jpeg">';opc=1;} else {divNiv.innerHTML = '';}
    if ((passw2!="")&&(passw2!="")&&(passw1!=passw2)) {divFalta.innerHTML= '<b><br/><br/>Passwords no coinciden<br/></b>';return false;}

   if (opc==1) {
       divFalta.innerHTML= '<br/><br/>(<img src="../images/valida.jpeg">)&nbsp;Dato Requerido';
       return false;
    } else {
      divResultado = document.getElementById('resultado');
      ajax=objetoAjax();
      ajax.open("POST", "aut_modificar_usuario.php" ,true);
      ajax.onreadystatechange=function() {
      if (ajax.readyState==1){
         divResultado.innerHTML= '<center><img src="../images/cargando.gif"><br/>Guardando los datos...</center>';
      } else if (ajax.readyState==4) {
               //mostrar los nuevos registros en esta capa
               divResultado.innerHTML = ajax.responseText;
            }
      }
      //muy importante este encabezado ya que hacemos uso de un formulario
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores
      ajax.send("nombre="+nombre+"&identif="+identif+"&passw1="+passw1+"&passw2="+passw2+"&nivel="+nivel+"&ident="+ident);
       return true;
    }
}

function esInteger(e)
{
    var charCode
    if (navigator.appName  ==  "Netscape") // Veo si es Netscape o Explorer (mas adelante lo explicamos)
        charCode = e.which // leo la tecla que ingreso
    else
        charCode = e.keyCode // leo la tecla que ingreso
    status = charCode
    if (charCode > 31 && (charCode < 48 || charCode > 58))
    { // Chequeamos que sea un numero comparandolo con los valores ASCII
            return false
    }
            return true
}

function pedirDatos(){
	//donde se mostrar� el formulario con los datos
	divFormulario = document.getElementById('contenedor');
	divCargando = document.getElementById('cargando');
	divDocu = document.getElementById('valida_dni');
	
	dni = document.getElementById('dni').value;		
	
	if (dni==0)
	{
		divDocu.innerHTML= '<img src="js/back.gif" border=0> Requerido ';	
		return false;
	}	
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod POST
	ajax.open("POST", "aut_nuevo_usuario.php");
	divCargando.innerHTML= '<img src="js/cargando.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divFormulario.innerHTML = ajax.responseText;
			divFormulario.style.display="block";
		}
	}
	//como hacemos uso del metodo POST
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando el codigo del empleado
	ajax.send("dni="+dni);
}

function cerrar(cierra) {
    div = document.getElementById(cierra);
    div.style.display='none';
    document.formulario.descripcion.value="";   
    document.formulario.abreviatura.value="";   
}