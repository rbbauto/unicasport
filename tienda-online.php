<!DOCTYPE html>
<html lang="en"  ng-app="app">
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
    <body class="bg-dark" ng-controller="productos">

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
            
            <div class="row">

                <div class="col-md-4">
                    <div class="float-right">
                        <input type="text" class="form-control" ng-model="buscarProductos" placeholder="Ingrese su Busqueda" />
                    </div>
                </div>
                 <div class="col-md-4 text-center"> 
                        <h1 class="text-muted"><i class="fas fa-shopping-cart"></i> Tienda en Linea</h1>
                </div>
                <div class="col-md-3 bg-light rounded text-right"> 
                    <span>
                        <div class="infoHeader" id="infoCarritoTooltip">
                            <div class="text-center">
                                <h3 class="text-muted text-center"><i class="fas fa-shopping-cart"></i> Carrito</h3>
                                <strong class="text-muted" ng-if="storage().length ==  0">Carrito Vacio!</strong>
                              
                            </div>
                            <div class="text-center" ng-if="carrito.length > 0">
                                 <span>{{ carrito.total |currency:'$'}}</span> <small>ARS |</small>&nbsp;{{carrito.items}}<small> items</small>
                            </div>
                            <div class="infoCarrito text-left" ng-if="carrito.length > 0">
                                <ul class="list-unstyled excerpt">
                                    <li class="list-group-item" 
                                        ng-repeat="producto in carrito">
                                        <span><img class="imgInfoCarrito" src="administracion/{{producto.imagen}}"></span>
                                        <span class="text-muted">{{producto.nombre}} </span>
                                        <span> ${{producto.precio}}<small>ARS</small></span>
                                        </li>
                                </ul>
                                
                                <div class="text-center">
                                    <small>
                                    <a ng-if="storage().length > 0" class="btn btn-primary" ng-click="vaciarCarro()">       Vaciar</a>
                                    <a ng-if="storage().length > 0" href="carrito.php" class="btn btn-success">Ir al carrito</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                       

                    </span>

                </div>
            </div>
            


        </header>
        <!-- Productos-->
        <section  class="page-section  bg-light">

            <div class="container">
                <div class="row">
                    <div ng-repeat="producto in productos | filter:buscarProductos" class="col-sm-3" id="{{$index}}">

                        <div class="card">
                            <img class="card-img-top img-fluid" src="administracion/{{producto.imagen}}"
                             alt="Card image cap"
                             data-placement="bottom"
                                    data-toggle="tooltip" 
                                    data-html="true" 
                                    title="<p class='text-left'>{{producto.descripcion}}</p>"
                            >  
                            <div class="card-body bg-light">
                                <h6 class="card-title">{{producto.nombre}}</h6>
                                 <span class="text-muted">{{producto.precio |currency:'$'}} </span> ARS
                                <hr class="divider" />
                    
                                <button ng-click="agregaAlCarrito($index)" class="btn btn-primary" data-toggle="modal" data-target="#modal_carrito">Agregar al Carrito</button>
                                
                            </div><!-- /div:card-body--> 
                        </div> <!-- /div:card--> 
                    </div><!-- /div:col-sm-3 -->
                </div><!-- /div:row -->
             </div><!-- /div:container-fluid-->
        </section>
        <!-- Productos-->


        <!-- Modal Carrito-->
            <?php 
                require_once"core/view/modalCarrito.php";
             ?>
        <!-- /Modal Carrito-->
        
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
        <script src="js/app.js"></script>
    </body>
</html>