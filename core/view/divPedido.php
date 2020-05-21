<div class="accordion" id="accordionExample">
    <!-- Card Datos -->
    <?php  require_once"core/view/datos.view.php"; ?>
    <!-- /Card Datos -->

    <!-- Card Direccion -->
    <?php  require_once"core/view/direccion.view.php"; ?>
    <!-- /Card Direccion -->

    <!-- Card Direccion -->
    <?php  require_once"core/view/envio.view.php"; ?>
    <!-- /Card Direccion -->
    
    <!-- Card Direccion -->
    <?php  require_once"core/view/pago.view.php"; ?>
    <!-- /Card Direccion -->

    <div class="col-md-12 text-center" ng-if="carrito.length < 1">
        <hr>
        <h1 class="col-md-12 text-center">Carrito Vacio!</h1>
        <a href="tienda-online.php" class="link">Ir a la tienda Online!</a>
    </div>
    
</div>