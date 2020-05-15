var app	=	angular.module('appShop',[]);

var Debug; // global

app.controller('carrito', ['$scope','$http', function($scope,$http){

	// variable para debugear en consola
	Debug= $scope;

	// metodo que devuelve el carrito almacenado en memoria local
	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : "";
	};

	// metodo que devuelve el total almacenado en memoria local
	$scope.getTotal=function(){
		return JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : 0;
	};

	$scope.setPedido=function(){
		localStorage.setItem("Pedido",JSON.stringify($scope.pedido));
	};

	$scope.getPedido=function(){
		return JSON.parse(localStorage.getItem("Pedido")) != null ? JSON.parse(localStorage.getItem("Pedido")) : {};
	};

	$scope.setEnvio=function(){
		localStorage.setItem("Envio",JSON.stringify($scope.envio));
	};

	$scope.getEnvio=function(){
		return JSON.parse(localStorage.getItem("Envio")) != null ? JSON.parse(localStorage.getItem("Envio")) : {};
	};

	$scope.login={};

	$scope.envio=$scope.getEnvio();

	$scope.pedido=$scope.getPedido(); // objeto pedido

	//$scope.multiplica=1; // valor inicial para

	$scope.carrito=[]; // array carrito

	$scope.total=$scope.getTotal(); // obtiene el total almacenado en memoria local

	$scope.items= $scope.storage().length; // obtiene la cantidad de items

	$scope.carrito=$scope.storage(); // recupera de memoria local el carrito

	// obtiene la cantidad de items cuando se cambia la cantidad en form
	$scope.getCantItems = function(selector) {
	    var sum = 0; 
	    $(selector).each(function() {
	        sum += Number($(this).val());
	    });
	    return sum;
	};

	// obtiene la cantidad de items desde el array carrito
	$scope.getCantItemsCart=function(){
		var total=0;
		for(i=0; i < $scope.carrito.length;i++){
			total = total + $scope.carrito[i].cantidad;
		}
		return total;
	}

	

	// borra un item del carrito y actualiza todo lo relacionado
	$scope.delItem=function(index){
		var tempTotal=$scope.getTotal();
		var result= tempTotal - parseFloat($scope.carrito[index].precio);
		localStorage.setItem("Total",JSON.stringify(result));
		$scope.carrito.splice(index, 1);
		$scope.total=$scope.getTotal();
		localStorage.setItem("Items",JSON.stringify($scope.carrito));
		$scope.items= $scope.storage().length;
		$scope.getCantItems('input[type=number]');
		$scope.getCantItems('[name=subtotal]');

	};

	// vacia el carrito
	$scope.vaciarCarro = function(){
		localStorage.clear();
		$scope.carrito=[];
		$scope.items = $scope.storage().length;
		
	};

	// cuando cambia la cantidad en form:carrito actualiza y almacena en local
	$scope.refreshCant=function(){
		this.producto.subtotal=this.producto.precio*this.multiplica;
		this.producto.cantidad=this.multiplica;
		localStorage.setItem("Items",JSON.stringify($scope.carrito));

	};

	// envia a la db el pedido
	$scope.enviarPedido=function(){
		
		$.post( "core/controller/addToCart.controller.php", JSON.stringify($scope.carrito) , function( data ) {
  			//$( ".result" ).html( data );
		}).done(function() {
    		window.location.replace("pedido.php")	
		}).fail(function() {
    		alert( "Hubo un error grave, por favor contacte al administrador!" );
 		});
	};

	// envia a la db el pedido
	$scope.confirmarPedido=function(){
		
		$.post( "core/controller/confirmCart.controller.php", JSON.stringify($scope.pedido) , function( data ) {
  			//$( ".result" ).html( data );
		}).done(function() {
			$scope.pedido.datDir=true;
			$scope.setPedido();
			$("#checkDatos").removeClass('invisible');
    		$("[data-target='#datos']").attr("data-target",null);
    		$("#headingOne").removeClass( "bg-dark");
    		$("#checkDir").removeClass('invisible');
    		$("[data-target='#direccion']").attr("data-target",null);
    		$("#headingTwo").removeClass( "bg-dark");	
		}).fail(function() {
    		alert( "Hubo un error grave, por favor contacte al administrador!" );
 		});
	};

	$scope.actualizarPedido=function(){
		
		$.post( "core/controller/updateCart.controller.php", JSON.stringify($scope.pedido) , function( data ) {
  			//$( ".result" ).html( data );
		}).done(function() {
			$scope.setPedido();    			
		}).fail(function() {
    		alert( "Hubo un error grave, por favor contacte al administrador!" );
 		});
	};

	$scope.checkLogin=function(){
		
		$.post( "core/controller/login.controller.php", JSON.stringify($scope.login) , function( data ) {
  			//$( ".result" ).html( data );
		}).done(function(data) {
			$scope.pedido=JSON.parse(data);
			($scope.objectSize($scope.pedido) > 0 ) ? $scope.setPedido() : null;
			$("#envio").collapse('show');
			$scope.$apply();
		}).fail(function() {
    		alert( "Nadie esta registrado con esos datos,por favor registrese con el modo: 'Pedir como invitado he ingrese contraseña para registrar'" );
 		});
	};

	$scope.checkPedido=function(){
		if ($scope.objectSize($scope.pedido) > 0) {
			$("#datos").collapse();
			$("[data-target='#datos']").attr("data-target",null);
    		$("#headingOne").removeClass( "bg-dark");
    		$("[data-target='#direccion']").attr("data-target",null);
    		$("#headingTwo").removeClass( "bg-dark");
    		setTimeout(function(){$("#envio").collapse('show');},33);
		}

		$scope.finalizarCompra=function(){
			var form={
				"carrito" : $scope.carrito,
				"pedido"  : $scope.pedido,
				"envio"	  : $scope.envio
			};
			$.post( "core/controller/submitCart.controller.php", JSON.stringify(form) , function( data ) {
  				$( "#resultPago" ).html( data );
  				$("#pago").collapse('show')
			}).done(function() {
				$scope.setPedido();    			
			}).fail(function() {
	    		alert( "Hubo un error grave, por favor contacte al administrador!" );
	 		});
		};


	};

	$scope.objectSize = function(obj) {
    	var size = 0, key;
    	for (key in obj) 
    	{
        	if (obj.hasOwnProperty(key)) size++;
    	}
    	return size;
	};

	$scope.editShow=function(dom){
		$("#" + dom ).collapse('show');
	};

	$scope.editHide=function(dom){
		$("#" + dom ).collapse('hide');
	};


	$(".se-pre-con").hide(); // oculta el loader

	// listener para modificar en local el total
	setTimeout(function(){
		$scope.checkPedido();
		$('.carrito_total').on('DOMSubtreeModified',function(){
			localStorage.setItem("Total",JSON.stringify(Number($(this).html().replace(",",""))));
		});
	},1000);
	

}]); // _/controller

// ambito global

//suma flotantes y devuelve resultado
var sumaFloat= function(valor1,valor2){
	var val1=isNaN(valor1) ? parseFloat(valor1) : valor1 ;
	var val2=isNaN(valor2) ? parseFloat(valor2) : valor2 ;
	return val1 + val2;
};

// muestra oculta el password en pedido
$("#show_password").on("click",function(){
   var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});






