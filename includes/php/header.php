<div class="navbar navbar-fixed-top navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../listaCertificado" class="navbar-brand"><img src="../images/icons/png/logo.min.png"></a>
            </div>              

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                              <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">Certificados</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../certificados/index.php">Alta / Modificaci&oacute;n</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                </ul>   
                            </li>
                            <li>
                              <a href="../admDependencia">Dependencia</a>
                            </li>                            
                            <li class="dropdown">
                              <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">Usuarios</a>
                                <ul class="dropdown-menu" role="menu">
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