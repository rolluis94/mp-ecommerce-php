<?php
	require __DIR__  . '/vendor/autoload.php';
	CONST ACCESSTOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181"; //cuenta de jesus.19922@hotmail.com para test
	CONST PUBLICKEY = "APP_USR-d81f7be9-ee11-4ff0-bf4e-20c36981d7bf";
	CONST INTEGRATOR_ID = "dev_24c65fb163bf11ea96500242ac130004";

	function getReference($id_producto,$nombre_producto,$descripcion_producto,$url_imagen,$total){
		try{

			$external_reference = "luis.rodriguez.sys@gmail.com";
			// Agrega credenciales
			MercadoPago\SDK::setAccessToken(ACCESSTOKEN);
			MercadoPago\SDK::setIntegratorId(INTEGRATOR_ID);

			// Crea un objeto de preferencia
			$preference = new MercadoPago\Preference();



			//crear comprador (payer)
			$payer = new MercadoPago\Payer();
			$payer->name = "Lalo";
			$payer->surname = "Landa";
			$payer->email = "test_user_58295862@testuser.com";
			$payer->phone = array(
			"area_code" => "52",
			"number" => "5549737300"
			);

			$payer->address = array(
			"street_name" => "Insurgentes Sur",
			"street_number" => 1602,
			"zip_code" => "0394​0"
			);

			//agregamos a la referencia
			$preference->payer = $payer;

			//crear Producto (item)
			$item = new MercadoPago\Item();
			$item->id = $id_producto;
			$item->title = $nombre_producto;
			$item->description = $descripcion_producto;
			$item->picture_url = $url_imagen;
			$item->quantity = 1;
			$item->external_reference = $external_reference;
			$item->currency_id = "MXN";
			$item->unit_price = $total;

			//agregamos a la referencia
			$preference->items = array($item);

			

			//Excluimos American Express y atm y 6 cuotas
			$preference->payment_methods = array(
			  "excluded_payment_methods" => array(
			    array("id" => "amex")
			  ),
			  "excluded_payment_types" => array(
			    array("id" => "atm")
			  ),
			  "installments" => 6
			);
			
			
			//back_urls
			$preference->back_urls = array(
			    "success" => "https://rolluis94-mp-ecommerce-php.herokuapp.com/pay/aprovado.php",
			    "failure" => "https://rolluis94-mp-ecommerce-php.herokuapp.com/pay/rechazado.php",
			    "pending" => "https://rolluis94-mp-ecommerce-php.herokuapp.com/pay/pendiente.php"
			);
			$preference->auto_return = "approved";

			//webhook
			$preference->notification_url = "https://rolluis94-mp-ecommerce-php.herokuapp.com/notificaciones/notificacion.php";

			$preference->save();
			echo $preference;

			return $preference;

		}catch (Exception $e) {

			echo json_encode($e);

		}

		
	}
?>