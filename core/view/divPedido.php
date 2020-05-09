<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header bg-dark" id="headingOne">
            <a class="menu_links">
            <h3 class="col-md-12 text-muted" data-toggle="collapse" data-target="#datos" aria-expanded="true" aria-controls=" collapseOne">
            1 Datos Personales
            </h3>  
            </a>
        </div>
        <div id="datos" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pedir como invitado</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Iniciar sesion</a>
                    </div><!-- /div:nav nav-tabs -->
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control">

                        <label for="nombre">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control">

                        <label for="email">Direccion de correo electronico</label>
                        <input type="email" name="email" class="form-control">
                        <hr>
                        <strong>Cree una cuenta</strong><i>(opcional)</i>
                        <p class="text-muted">¡Y ahorre tiempo en su próximo pedido!</p>
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="pass" name="password" class="form-control">
                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-primary" type="button">
                                    <span class="fa fa-eye-slash icon"></span>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row float-right">
                            <button data-toggle="collapse" data-target="#direccion" aria-expanded="true" class="btn btn-success">Continuar</button>
                         </div>
                         <br>
                    </div><!-- /div:form-group -->
                    </div>
                        <div    class="tab-pane fade text-center" 
                                id="nav-profile" 
                                role="tabpanel" 
                                aria-labelledby="nav-profile-tab">
                        
                            <form class="form-signin" method="post" action="login.php">
                                <img class="mb-4" src="administracion/assets/imgDefault/login.jpg" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 font-weight-normal"><i class="fas fa-shopping-cart"></i> Tienda Virtual</h1>
                                <label for="inputEmail" class="sr-only">Nombre Usuario</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre Usuario" required autofocus>
                                <label for="inputPassword" class="sr-only">Contraseña</label>
                                <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña" required>
                                <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Conectar</button>
                            </form>

                    </div><!-- /div:form-group -->
                </div><!-- /div:tab-content -->
            </div><!-- /div:card-body -->
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-dark" id="headingTwo">
            <a class="menu_links">
            <h3 class="col-md-12 text-muted" data-toggle="collapse" data-target="#direccion" aria-expanded="true" aria-controls=" collapseOne">
            Direcciones
            </h3>  
            </a>
        </div>
        <div id="direccion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-dark" id="headingThree">
            <a class="menu_links text-muted">
            <h3 class="col-md-12" data-toggle="collapse" data-target="#envio" aria-expanded="true" aria-controls=" collapseOne">
            Metodo de Envio
            </h3>  
            </a>
        </div>
        <div id="envio" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-dark" id="headingThree">
            <a class="menu_links text-muted">
            <h3 class="col-md-12" data-toggle="collapse" data-target="#pago" aria-expanded="true" aria-controls=" collapseOne">
            Pago
            </h3>  
            </a>
        </div>
        <div id="pago" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
</div>