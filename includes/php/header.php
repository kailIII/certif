<!-- <header>
    <div class="topvar">
            <div class="topvar-inner container">
                <div><a href="../inicio/inicio.php" class="logo"></a></div>
                <div class="navbar navbar-inverse col-lg-6">
                    <div class="navbar-header">
                       <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
                    </div>            
                    <div class="navbar-collapse collapse" id="nav-collapse-01">
                        <ul class="nav">
                            <li>
                              <a href="#fakelink">
                                Licitaciones
                              </a>
                                <ul>
                                  <li><a href="#fakelink">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Licitaciones 
                            </li>
                            <li>
                              <a href="#fakelink">
                                Obras
                              </a>
                                <ul>
                                  <li><a href="../obras/index.php">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                  <li><a href="../obras/listado.php">Listado</a></li>
                                </ul>  /Sub menu obras 
                            </li>
                            <li>
                              <a href="#fakelink">
                                Certificados
                              </a>
                                <ul>
                                  <li><a href="../certificados/index.php">Altas</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Certificados 
                            </li>
                            <li>
                              <a href="../admDependencia">
                                Dependencia
                              </a>
                                <ul>
                                  <li><a href="../certificados/index.php">Altas</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Certificados 
                            </li>
                            <li>
                              <a href="#fakelink">
                                Usuarios
                              </a>
                                <ul>
                                  <li><a href="../usuarios/index.php">Altas</a></li>
                                  <li><a href="../usuarios/listaUsuario.php">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Certificados 
                            </li>
                        </ul>
                    </div> 
                </div>
                <div class="topvar-inner-info">
                    <div class="text-left text-muted">
                        <?php // echo $_SESSION['nombre']; ?>
                        |
                        <a href="../inicio/cerrar.php">cerrar sesion</a>
                    </div>
                </div>
            </div>
    </div>
</header>-->
<div class="navbar navbar-fixed-top navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="navbar-header">
               <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
            </div>              
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../inicio/inicio.php" class="navbar-brand logo"><img src="../images/icons/png/logo.min.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                              <a href="#fakelink">
                                Certificados
                              </a>
                                <ul>
                                  <li><a href="../certificados/index.php">Altas</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>   
                            </li>
                            <li>
                              <a href="../admDependencia">
                                Dependencia
                              </a>
<!--                                <ul>
                                  <li><a href="../certificados/index.php">Altas</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Certificados -->
                            </li>                            
                            <li>
                              <a href="#fakelink">
                                Usuarios
                              </a>
                                <ul>
                                  <li><a href="../usuarios/index.php">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>   
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="usuario" href="#"><?php echo $_SESSION['nombre']; ?></a></li>
                            <li><a href="../inicio/cerrar.php">cerrar sesion</a></li>
                        </ul> 
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>