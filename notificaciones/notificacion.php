<?php


	//Obtenemos Json
	$json_params = file_get_contents("php://input");	
	$data = json_decode($json_params);

	//Pago Creado
	if ($data->action == 'payment.created'){
	 	$file = fopen("archivo.txt", 'r+');
	 	fseek($file, 0, SEEK_END);
	 	fwrite($file, "***************************************************" . PHP_EOL);
	 	fwrite($file, "********************PAGO CREADO********************" . PHP_EOL);
	 	fwrite($file, $json_params . PHP_EOL);
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fclose($file);
	}

	//Pago Creado
	if ($data->action == 'payment.updated'){
	 	$file = fopen("archivo.txt", 'r+');
	 	fseek($file, 0, SEEK_END);
	 	fwrite($file, "***************************************************" . PHP_EOL);
	 	fwrite($file, "********************PAGO ACTUALIZADO********************" . PHP_EOL);
	 	fwrite($file, $json_params . PHP_EOL);
	 	switch($data->type) {
	        case "payment":
	            $payment = MercadoPago\Payment.find_by_id($data->data.id);
	            fwrite($file, "id_pago: ".$payment->id . PHP_EOL);
	            fwrite($file, "estatus: ".$payment->status . PHP_EOL);
	            break;
	        
    	}
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fclose($file);
	}


	if ($data->action == 'test.created'){
	  	$file = fopen("archivo.txt", 'r+');
	  	fseek($file, 0, SEEK_END);
	 	fwrite($file, "***************************************************" . PHP_EOL);
	 	fwrite($file, "********************PAGO ACTUALIZADO********************" . PHP_EOL);
	 	fwrite($file, $json_params . PHP_EOL);
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "***************************************************" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fwrite($file, "" . PHP_EOL);
		fclose($file);
	}

	http_response_code(200); // Return 200 OK 
	
?>
