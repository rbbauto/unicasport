<div class="card">
    <div class="card-header bg-dark bg-custom" id="headingOne">
        <a class="menu_links">
        <h3 class="col-md-12 text-muted" data-toggle="collapse" data-target="#datos" aria-expanded="true" aria-controls=" collapseOne">
        1 Datos Personales 
        <i ng-if="objectSize(pedido) > 3" id="checkDatos" class="fas fa-check text-success"></i>
            <i ng-if="objectSize(pedido) > 3" ng-click="editShow('datos')" class="fas fa-edit text-info"></i>
            </h3>  
            </a>
        </div>
        
        <div id="datos" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                        <strong ng-if="objectSize(pedido) <= 4">Pedir como invitado</strong>
                        <strong class="text-info" ng-if="objectSize(pedido) >= 12">Editar informacion</strong>
                    </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Iniciar sesion</a>
                    </div><!-- /div:nav nav-tabs -->
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input ng-model="pedido.nombre" type="text" name="nombre" class="form-control" required>

                        <label for="nombre">Apellidos</label>
                        <input ng-model="pedido.apellido" type="text" name="apellidos" class="form-control" required>

                        <label for="email">Direccion de correo electronico</label>
                        <input ng-model="pedido.email" type="email" name="email" class="form-control" required>
                        <hr>

                        <div ng-if="objectSize(pedido) <= 4">
                            <strong>Cree una cuenta</strong><i>(opcional)</i>
                            <p class="text-muted">¡Y ahorre tiempo en su próximo pedido!</p>
                        </div>

                        <div ng-if="objectSize(pedido) >= 12">
                            <strong>Cambie su contraseña</strong><i>(si asi lo prefiere)</i>
                            <p class="text-muted">¡si cambia su contraseña memorizela bien o gurdela en un lugar seguro!</p>
                        </div>

                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input  ng-model="pedido.contrasenia" type="password" id="pass" name="password" class="form-control">
                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-primary" type="button">
                                    <span class="fa fa-eye-slash icon"></span>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row float-right">
                            <button ng-if="objectSize(pedido) < 1" data-toggle="collapse" data-target="#direccion" aria-expanded="true" class="btn btn-success">Continuar</button>

                            <button ng-if="objectSize(pedido) > 0" ng-click="editShow('direccion')" class="btn btn-success">Continuar</button>
                         </div>
                         <br>
                    </div><!-- /div:form-group -->
                    </div>
                        <div    class="tab-pane fade text-center" 
                                id="nav-profile" 
                                role="tabpanel" 
                                aria-labelledby="nav-profile-tab">
                        
                            <form class="form-signin">
                                <img class="mb-4" src="administracion/assets/imgDefault/login.jpg" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 font-weight-normal"><i class="fas fa-shopping-cart"></i> Tienda Virtual</h1>
                                <input name="email" type="text" ng-model="login.nombre" class="form-control" placeholder="Ingrese su email" required autofocus>
                                <input name="password" type="password" ng-model="login.contrasenia" class="form-control" placeholder="Contraseña" required>
                                <button class="btn btn-lg btn-primary btn-block" ng-click="checkLogin()"><i class="fas fa-sign-in-alt"></i> Conectar</button>
                            </form>

                    </div><!-- /div:form-group -->
                </div><!-- /div:tab-content -->
            </div><!-- /div:card-body -->
        </div>
</div>