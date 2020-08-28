<?php
	if (isset($_GET["preference_id"])) {

		echo $_GET["preference_id"];
		# code...
		$collection_id = $_GET["collection_id"];
		$collection_status = $_GET["collection_status"];
		$external_reference = $_GET["external_reference"];
		$payment_type = $_GET["payment_type"];
		$preference_id = $_GET["preference_id"];
		$site_id = $_GET["site_id"];
		$processing_mode = $_GET["processing_mode"];
		$merchant_account_id = $_GET["merchant_account_id"];
		
	}
?>
