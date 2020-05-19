<?php 
	if (
			($_GET['external_reference'] == gethostname()) && 
			($_GET['collection_status'] == "approved")	   && 
			($_GET['checkout'] == "go")
		) 
	{
		$aprovado=true;
	}else
	{
		$aprovado=false;
	}
?>	
<!DOCTYPE html>
<html lang="en"  ng-app="appShop">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tienda Online!</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body class="bg-dark" ng-controller="carrito">

        <!-- Navigation-->
        
            <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <i class="fas fa-futbol fa-lg"></i><a class="navbar-brand js-scroll-trigger" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/">&nbspUnica Sport</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/#Nosotros">Empresa</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/#Servicios">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/#portfolio">Galeria</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/tienda-online.php">Tienda Online</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] . "/" . basename(__DIR__); ?>/#Contacto">Contacto</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <!-- /Navigation-->
        <div class="se-pre-con"></div>
        <header class="headerCustom">
        </header>

        <section class="page-section  bg-light">
        	<div class="container text-center">
	            <div class="row">
	               
	                <div class="col-md-12">
                        <?php if($aprovado){ ?>
                        <h1 class="alert alert-success">
                           <i class="fas fa-check"></i> pago completo
                       </h1>
                        <?php }else{ ?>
                        <h1 class="alert alert-danger">Pago Rechazado</h1>
                        <?php } ?>
                    
                        <h2>Informacion de compra:</h2>
                    </div><!-- / div:col-md-12-->
	                
	                	
                    <div class="col-md-12 text-left">
                        <p>Cantidad de articulos {{ getCantItemsCart()}} <a href="" onclick="$('#detalle').fadeToggle()">ver detalle</a></p>
                        <p>Por un total de {{getTotal() |currency:'$'}}ARS</p>
                        <p>Costo de envio {{ pedido.costoEnvio |currency:'$'}}ARS</p>
                        <p>Total con envio {{ (getTotal() + pedido.costoEnvio) |currency:'$'}}ARS</p>
                    </div><!-- / div:col-md-12-->
	                <div class="col-md-12">
                        <div id="detalle" class="col-md-6 text-left" ng-if="carrito.length > 0">
                                <ul class="list-unstyled">
                                    <li class="list-group-item" 
                                        ng-repeat="producto in carrito">
                                        <span><img class="imgInfoCarrito" src="administracion/{{producto.imagen}}"></span>
                                        <span class="text-muted">{{producto.nombre}} </span>
                                        <span> ${{producto.precio}}<small>ARS</small></span>
                                        </li>
                                </ul>
                        </div><!-- / div:infoCarrito text-left-->
                    </div><!-- / div:col-md-12-->
	            </div> <!-- /div:row-->
        	</div> <!-- /div:container-fluid-->	
        </section>
        
        
        <!-- /cobro-->


        
        
        <footer class="bg-light py-5">
            <div class="container">
                <div class="col-md-12 text-center">
                         
                                
                </div>
        
                <div class="small text-center text-muted">Copyright © 2020 - RBB Soft</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Core Framework-->
        <script src="administracion/lib/angular.min.js"></script>
        <!-- Core App -->
        <script src="js/appShop.js"></script>
    </body>
</html>