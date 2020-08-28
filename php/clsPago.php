<?php
	include("mpcheckout.php");
	date_default_timezone_set('America/Mexico_City');

	header('Content-Type: application/json; charset=utf-8');



	if(isset($_POST["peticion"]) && !empty($_POST["peticion"])){
		$peticion = $_POST['peticion'];

		switch ($peticion) {

			case 'obtener_referencia_mercadopago':

				$nombre_producto = $_POST['nombre_producto'];
				$descripcion_producto = $_POST['descripcion_producto'];
				$id_producto = $_POST['id_producto'];
				$url_imagen = $_POST['url_imagen'];
				$total = $_POST['total'];

				$respuesta = pagos::obtener_referencia_mercadopago($id_producto,$nombre_producto,$descripcion_producto,$url_imagen,$total);

				echo json_encode($respuesta);

				break;default:

				echo "error";

				break;

		}

	}


	class pagos

	{

		function __construct(){}



		static function obtener_referencia_mercadopago($id_producto,$nombre_producto,$descripcion_producto,$url_imagen,$total){
			echo "string";

			$preferencia = getReference($id_producto,$nombre_producto,$descripcion_producto,$url_imagen,$total);

			return new objRespuesta(true, "OK",  $preferencia->id);

		}

	}


?>