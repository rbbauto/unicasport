var app	=	angular.module('app',[]);

var Debug;

app.controller('productos', ['$scope','$http', function($scope,$http){

	Debug= $scope;

	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : "";
	}

	$scope.productos = [];

	$scope.producto = {};

	$scope.carrito=[];

	$scope.item =[];

	$scope.carrito.total=0.00;

	$scope.carrito.items=0;

	//listado de productos
	$scope.listProducts = function(){

		$http.get('administracion/ajax.php?list',{})
		.then(function success(e){
			$scope.productos = e.data.productos;
		}, function error(e){

			console.log("Se ha producido un error al recuperar la información");
		});
	};

	//agrega producto al carrito

	$scope.agregaAlCarrito	=	function(index){

		$scope.carrito.item=$scope.productos[index];
		$scope.carrito.push($scope.productos[index]);
		localStorage.setItem("Items",JSON.stringify($scope.carrito));
		$scope.carrito.total = parseFloat($scope.carrito.item.precio) + parseFloat($scope.carrito.total); // no funciona
		localStorage.setItem("Total",JSON.stringify($scope.carrito.total));
		$scope.carrito.items = $scope.storage().length;
		
	}

	// vacia el carrito
	$scope.vaciarCarro = function(){
		localStorage.clear();
		$scope.carrito.items = $scope.storage().length;
		$scope.carrito.total=JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : "";
	}
	
	
	$(".se-pre-con").hide()

	$scope.listProducts();
	$scope.carrito.items = $scope.storage().length;
	$scope.carrito.total=JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : "";

	
}])