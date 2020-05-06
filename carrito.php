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
            
            <div class="row">

                <div class="col-md-4">
                    <div class="float-right">
                        
                    </div>
                </div>
                 <div class="col-md-4 text-center"> 
                        <h1 class="text-muted"><i class="fas fa-shopping-cart"></i> Tienda en Linea</h1>
                </div>
                <div class="col-md-3 bg-light rounded text-center"> 
                    <span>
                        <div class="infoHeader">
                            <i class="fas fa-shopping-cart fa-2x"></i><strong class="text-muted" ng-if="storage().length ==  0">Carrito Vacio!</strong>
                            <small>
                                <a ng-if="storage().length > 0" class="btn btn-primary" ng-click="vaciarCarro()">Vaciar</a>
                            </small>
                        </div>
                        <span>{{ total |currency:'$'}}</span><small> ARS | </small>&nbsp;{{items}}<small> items</small>

                    </span>

                </div>
            </div>
            


        </header>
        <!-- Carrito-->
        <section  class="page-section  bg-light">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-8">
                        <h3>Carrito</h3><hr>
                        <ul class="list-unstyled">
                            <li ng-repeat="producto in carrito track by $index">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="administracion/{{producto.imagen}}" class="imgProduct rounded">
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{producto.nombre}}</p>
                                        <h4><span>{{producto.precio |currency:'$'}}</span></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="cantidad" class="text-muted">Cantidad</label>
                                        <input ng-model="multiplica" min="1" max="{{producto.stock}}" class="form-control col-xs-2" type="number" id="cantidad">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="text-muted">Sub-Total</label>
                                        <span>{{producto.precio * multiplica |currency:'$'}} ARS</span>
                                        
                                    </div>
                                </div>
                                <hr/>
                            </li>
                            
                        </ul>
                
                    </div><!-- /div:col-md-8-->
                    <div class="col-md-4 border">
                        <div class="col-md-12">
                            <h5 class="text-muted text-center">Resumen de Compra</h5>
                        </div>
                        <div class="float-left">
                            <p>{{items}} articulos por un total de </p>
                        </div>
                        <div class="float-right">
                            <span class="text-muted">{{total|currency:'$'}} ARS</span>
                        </div>
                        <div class="col-md-12" style="clear:both;">
                            <hr>
                            <div class="float-left">Total (impuestos inc.)</div><div class="float-right">{{total |currency:'$'}} ARS</div>
                        </div>

                    </div><!-- /div:col-md-4-->

                </div>
        </section>
        <!-- /carrito-->


        
        
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