<div class="card">
        <div class="card-header bg-dark  bg-custom" id="headingTwo">
            <a class="menu_links">
            <h3 class="col-md-12 text-muted" data-toggle="collapse" data-target="#direccion" aria-expanded="true" aria-controls=" collapseOne">
            2 Direcciones 
            <i ng-if="objectSize(pedido) > 12" id="checkDatos" class="fas fa-check text-success"></i>
            <i ng-if="objectSize(pedido) > 12" ng-click="editShow('direccion')" class="fas fa-edit text-info"></i>
            </h3>  
            </a>
        </div>
        <div id="direccion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="">Nombre</label>
                            <input ng-model="pedido.nombre" class="form-control" type="" name="nombre" required>
                        </div>
                        <div class="col">
                            <label for="">Apellido</label>
                            <input ng-model="pedido.apellido" class="form-control" type="" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Empresa</label>
                            <input ng-model="pedido.empresa" class="form-control" type="" name="empresa">
                        </div>
                        <div class="col">
                            <label for="">CUIT/CUIL/DNI</label>
                            <input ng-model="pedido.cuit" class="form-control" type="" name="cuit" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Dirección</label>
                            <input ng-model="pedido.direccion" class="form-control" type="" name="direccion" required>
                        </div>
                        <div class="col">
                            <label for="">Código postal/Zip </label>
                            <input ng-blur="getCost()" ng-model="pedido.cp" class="form-control" type="" name="cp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Ciudad</label>
                            <input ng-model="pedido.ciudad" class="form-control" type="" name="ciudad" required>
                        </div>
                        <div class="col">
                            <label for="">Provincia</label>
                            <input ng-model="pedido.provincia" class="form-control" type="" name="provincia" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Pais</label>
                            <input ng-model="pedido.pais" class="form-control" type="" name="pais" required>
                        </div>
                        <div class="col">
                            <label for="">Telefono</label>
                            <input ng-model="pedido.telefono" class="form-control" type="" name="telefono"required>
                        </div>
                    </div>
                    <div class="form-check col">
                        <input  ng-model="pedido.checkboxFacturarAca" class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                        <label class="form-check-label" for="defaultCheck1">
                        <i>Utilizar esta dirección para facturas también</i>
                      </label>
                    </div>
                    <hr>
                    <div class="form-row float-right">
                        <button
                            ng-if="!pedido.datDir"
                            ng-click="confirmarPedido()" 
                            data-toggle="collapse" 
                            data-target="#envio" 
                            aria-expanded="true" 
                            class="btn btn-success">Continuar</button>
                        <button
                            ng-if="pedido.datDir"
                            ng-click="actualizarPedido()" 
                            data-toggle="collapse" 
                            data-target="#envio" 
                            aria-expanded="true" 
                            class="btn btn-success">Actualizar</button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>