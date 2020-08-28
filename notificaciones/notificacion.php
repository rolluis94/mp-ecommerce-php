<?php



	$json_params = file_get_contents("php://input");
	
	$data = json_decode($json_params);
	
	
	echo $json_params;

	echo $data->action;

	if ($data->action == 'payment.created'){
	  $msg = "Tu pago ha sido creado.";
	  mail("luis.rodriguez.sys@gmail.com","Pago creado",$json_params);
	}

	if ($data->action == 'payment.updated'){
	  $msg = "Tu pago ha sido creado.";
	  mail("luis.rodriguez.sys@gmail.com","Pago creado",$json_params);

	  	switch($data->type) {
	        case "payment":
	            $payment = MercadoPago\Payment.find_by_id($data->data.id);
	            break;
	        
    	}

	}


	if ($data->action == 'test.created'){
	  
	   $file = fopen("archivo.txt", "w");

		fwrite($file, $json_params . PHP_EOL);

		

		fclose($file);
	}

	http_response_code(200); // Return 200 OK 
	
?>
