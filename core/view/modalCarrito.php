<div class="modal fade" id="modal_carrito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
               <div class="modal-header">
                   
                    <h4 class="col-md-12 modal-title text-center" id="myModalLabel"> has agregado: <i class="alert-warning">{{carrito.item.nombre}}</i> correctamente al carrito de Compras</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div> 
            
                <div class="row">
                    
                        <div class="col-md-4">
                            <img class="img-fluid" src="administracion/{{carrito.item.imagen}}">
                        </div>

                         <div class="col-md-4">
                             <p>{{carrito.item.descripcion}}</p>
                         </div>

                         <div class="col-md-4">
                             <p>{{carrito.item.precio}}</p>
                         </div>
                       

                </div> <!-- /div row -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="">Guardar Categoria</button>
                </div>
            </div>
        </div>
    </div>