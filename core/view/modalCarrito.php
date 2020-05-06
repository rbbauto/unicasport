<div class="modal fade" id="modal_carrito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
               <div class="modal-header">
                   
                    <h4 class="col-md-12 modal-title text-center" id="myModalLabel"> has agregado: <i class="alert-warning">{{carrito.item.nombre}}</i> correctamente al carrito de Compras</h4> 
                </div> 
            
                <div class="container">
                    <div class="row">
                    
                        <div class="col-md-4">
                            <img class="img-fluid" src="administracion/{{carrito.item.imagen}}">
                        </div>

                         <div class="col-md-4">
                            <h1>{{carrito.item.nombre}}</h1>
                            <h2>${{carrito.item.precio }} ARS</h2>
                             <p>{{carrito.item.descripcion}}</p>
                         </div>

                         <div class="col-md-4">
                             <p></p>
                         </div>
                       

                     </div> <!-- /div row -->
                    
                </div> <!-- / div container -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Seguir Comprando</button>
                    <button type="button" class="btn btn-primary" ng-click="">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>