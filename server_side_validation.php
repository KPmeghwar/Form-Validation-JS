<?php 

	echo "Welcome to Server Side";
	echo "<pre>";
	print_r($_POST);
	if (isset($_POST['regisration'])) {
		
		extract($_POST);
		 $first_name = $_POST['first_name'];
		 $middle_name = $_POST['middle_name'];
		 $last_name = $_POST['last_name'];
		 $gender = $_POST['gender']??null;



		// echo $first_name;


		$pattern_first_name = "/^[A-Z]{1}[a-z]{2,}$/";

		$status = true;
		$errors = null;

		if ($first_name == '') {
			
			$status = false;	
			$errors .= "<li>Please Enter First Name</li>";
		}else if(!preg_match($pattern_first_name, $first_name)){

			$status = false;	
			$errors .= "<li>Invalid input First name</li>";
		}

		if ($middle_name == '') {
			
			// $status = false;	
			// echo "Please Enter First Name";
		}else if(!preg_match($pattern_first_name, $middle_name)){

			$status = false;	
			$errors .= "<li>Invalid input Middle Name</li>";
		}

		/*if (!($middle_name != '' && preg_match($pattern_first_name, $first_name)) ) {
			
			echo "string";
		}*/

		if ($last_name == '') {
			
			$status = false;	
			$errors .= "<li>Please Enter Last Name</li>";
		}else if(!preg_match($pattern_first_name, $last_name)){

			$status = false;	
			$errors .= "<li>Invalid input Last Name</li>";
		}

		if ($gender == null) {
			
			$status = false;
			$errors .= "<li>Please specify gender</li>";
		}else{

			$status = true;
		}

		if ($country == '') {
			
			$status = false;
			$errors .= "<li>Please select your country</li>";	
		}

		if ($status == true) {
			
			echo "Server Side Validation Successfull..! ";
		}else{

			// echo "Errors";
			header("location:form_validation_client_side.php?msg=$errors");
		}
	}
 ?>