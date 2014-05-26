 <header>
    <div class="topvar">
            <div class="topvar-inner container">
                <div><a href="../inicio/inicio.php" class="logo"></a></div>
                <div class="navbar navbar-inverse col-lg-6">
                    <div class="navbar-header">
                       <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
                    </div>            
                    <div class="navbar-collapse collapse" id="nav-collapse-01">
                        <ul class="nav">
<!--                            <li>
                              <a href="#fakelink">
                                Licitaciones
                              </a>
                                <ul>
                                  <li><a href="#fakelink">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul>  /Sub menu Licitaciones 
                            </li>-->
<!--                            <li>
                              <a href="#fakelink">
                                Obras
                              </a>
                                <ul>
                                  <li><a href="../obras/index.php">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                  <li><a href="../obras/listado.php">Listado</a></li>
                                </ul>  /Sub menu obras 
                            </li>-->
                            <li>
                              <a href="#fakelink">
                                Certificados
                              </a>
                                <ul>
                                  <li><a href="../certificados/index.php">Altas</a></li>
                                  <li><a href="../listaCertificado">Listado</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul> <!-- /Sub menu Certificados -->
                            </li>
                            <li>
                              <a href="#fakelink">
                                Usuarios
                              </a>
                                <ul>
                                  <li><a href="../usuarios/index.php">Altas</a></li>
                                  <li><a href="#fakelink">Modificaciones</a></li>
                                  <li><a href="#fakelink">Bajas</a></li>
                                </ul> <!-- /Sub menu Certificados -->
                            </li>
                        </ul>
                    </div> 
                </div>
                <div class="topvar-inner-info">
                    <div class="text-left text-muted">
                        <?php echo $_SESSION['nombre']; ?>
                        |
                        <a href="../inicio/cerrar.php">cerrar sesion</a>
                    </div>
                </div>
            </div>
    </div>
</header>