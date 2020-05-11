<div class="modal fade" id="modal_carrito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
               <div class="modal-header">
                   
                    <h4 class="col-md-12 modal-title text-center" id="myModalLabel"> has agregado: <i class="alert-warning">{{carrito.item.nombre}}</i> correctamente al carrito de Compras</h4> 
                </div> 
            
                <div class="container">
                    <div class="row">
                    
                        <div class="col-md-4 text-center">
                            <img class="img-fluid imgProduct" src="administracion/{{carrito.item.imagen}}">
                        </div>

                         <div class="col-md-3">
                            <br>
                            <h4>{{carrito.item.nombre}}</h4>
                            
                            <h5><span>{{carrito.item.precio |currency:'$' }} ARS</span></h5>
                            <h5>Categoria: {{carrito.item.categoria}}</h5>
                            
                             
                         </div>

                         <div class="col-md-5">
                            <br>
                            <div>
                              <h3 class="alert alert-info"><i class="fas fa-info-circle"></i> Puedes elegir la cantidad en el carrito</h3>
                            </div>
                             
                            
                         </div>
                       

                     </div> <!-- /div row -->
                    
                </div> <!-- / div container -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Seguir Comprando</button>
                    <a href="carrito.php" class="btn btn-primary">Ir al carrito</a>
                </div>
            </div>
        </div>
    </div>
