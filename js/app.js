var app	=	angular.module('app',[]);

var Debug;

app.controller('productos', ['$scope','$http', function($scope,$http){

	Debug= $scope;

	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : "";
	}

	$scope.productos = [];

	$scope.producto = {};

	$scope.items=0;

	$scope.carrito=[];


	$scope.item =[];

	$scope.carrito.total=0;

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
		localStorage.setItem("Items",JSON.stringify($scope.carrito))
		$("#spanItems").html($scope.storage().length);
	}

	// vacia el carrito
	$scope.vaciarCarro = function(){
		localStorage.clear();
		$("#spanItems").html($scope.storage().length);
	}
	
	
	$(".se-pre-con").hide()

	$scope.listProducts();
	$("#spanItems").html($scope.storage().length);

	
}])