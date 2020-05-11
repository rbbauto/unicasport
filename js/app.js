var app	=	angular.module('app',[]);

var Debug;

app.controller('productos', ['$scope','$http', function($scope,$http){

	Debug= $scope;

	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : [];
	};

	$scope.getTotal=function(){
		return JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : 0;
	};

	$scope.productos = [];

	$scope.producto = {};

	$scope.carrito=$scope.storage();

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
		setTimeout(function(){
			$(".infoCarrito").hide();
		},10);
		var checkDuplicate=Object.keys($scope.storage());
		$scope.carrito.item=$scope.productos[index];
		$scope.carrito.item.subtotal=$scope.productos[index].precio;
		$scope.carrito.item.cantidad=1;
		$scope.carrito[index]= $scope.productos[index];
		localStorage.setItem("Items",JSON.stringify($scope.carrito));

		if((checkDuplicate.includes(index.toString()))){
			alert("El Producto ya fue incluido en el carrito de compras");
			setTimeout(function(){$("#modal_carrito").modal('hide');},100);
		}else{
			$scope.carrito.total = sumaFloat($scope.carrito.item.precio,JSON.parse(localStorage.getItem("Total")));
			localStorage.setItem("Total",JSON.stringify($scope.carrito.total));
		}

		$scope.carrito.items = $scope.storage().length;
		
	}; // /agregaAlCarrito

	// vacia el carrito
	$scope.vaciarCarro = function(){
		localStorage.clear();
		$scope.carrito=[];
		$scope.carrito.items = $scope.storage().length;
		$scope.carrito.total= $scope.getTotal();
	};
	
	setTimeout(function(){
		$(".se-pre-con").hide();
		$(".infoCarrito").hide();
	},1000);

	$scope.listProducts();
	$scope.carrito.items = $scope.storage().length;
	$scope.carrito.total= $scope.getTotal();

	setTimeout(function(){
		$('[data-toggle="tooltip"]').tooltip({
 		    'delay': { show: 0, hide: 330 }
});
	},500); 

	
}]); // _/controller

var sumaFloat= function(valor1,valor2){
	var val1=isNaN(valor1) ? parseFloat(valor1) : valor1 ;
	var val2=isNaN(valor2) ? parseFloat(valor2) : valor2 ;
	return val1 + val2;
};

$("#infoCarritoTooltip").mouseover(function(){
	$(".infoCarrito").is(":visible") ?
		$(".infoCarrito").mouseout(function(){
			$(".infoCarrito").hide() ;
		}) 		: 
		$(".infoCarrito").show() ;
});