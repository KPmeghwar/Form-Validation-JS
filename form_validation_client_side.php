<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Client Side Validation</title>

	<style type="text/css">
		span{
			color: red;
		}
	</style>

	<script type="text/javascript">
		
		function client_side_validation(){

			// alert("ok");

			var first_name = document.getElementById('first_name').value;
			var middle_name = document.getElementById('middle_name').value;
			var last_name = document.getElementById('last_name').value;

			var male = document.getElementById('male').checked;
			var female = document.getElementById('female').checked;
			
			var country = document.getElementById('country').value;

			// alert(country);
			// alert(male);
			// alert(female);

			// var patt_first_name = new RegExp("^[A-Z]{1}[a-z]{2,}$");
			var patt_first_name = /^[A-Z]{1}[a-z]{2,}$/;

			var result_first_name = patt_first_name.test(first_name);
			var result_middle_name = patt_first_name.test(middle_name);
			var result_last_name = patt_first_name.test(last_name);

			// if (result_first_name) {

			// 	alert('True');
			// }else{

			// 	alert('false');
			// }

			var flag = true;

			if (first_name == '') {

				flag = false;
				document.getElementById('msg_first_name').innerHTML = "Please Enter First Name";
			}else if(!result_first_name){
				flag = false;
				document.getElementById('msg_first_name').innerHTML = "Pattern not matched";
			}else{
				flag = true;
				document.getElementById('msg_first_name').innerHTML = "";
			}



			if (middle_name == '') {

				document.getElementById('msg_middle_name').innerHTML = "";
			}
			else if (!result_middle_name) {
				flag = false;
				document.getElementById('msg_middle_name').innerHTML = "Pattern not matched";
			}else{
				flag = true;
				document.getElementById('msg_middle_name').innerHTML = "";
			}

			if (last_name == '') {
				flag = false;
				document.getElementById('msg_last_name').innerHTML = "Please Enter Last Name";
			}else if(!result_last_name){
				flag = false;
				document.getElementById('msg_last_name').innerHTML = "Pattern not matched";
			}else{
				flag = true;
				document.getElementById('msg_last_name').innerHTML = "";
			}

			if (!(male || female)) {
				flag = false;
				document.getElementById('msg_gender').innerHTML = "Please Specify Gender";
			}else{
				flag = true;
				document.getElementById('msg_gender').innerHTML = "";
			}

			if (country == '') {
				flag = false;
				document.getElementById('msg_country').innerHTML = "Please Select your Country";
			}else{
				flag = true;
				document.getElementById('msg_country').innerHTML = "";
			}

			if (flag == true) {

				return true;
			}else{

				return false;
			}
		}
	</script>
</head>
<body>
	<h1>Registration Form</h1>
	<hr>
	<fieldset style="margin-left: 10%;width: 70%;">
		<legend>Form ..!</legend>

		<form action="server_side_validation.php" onsubmit="return client_side_validation()" method="POST">
			<table cellspacing="8">
				<tr>
					<td colspan="2" style="color: red;"><?php echo (isset($_GET['msg']))?$_GET['msg']:null; ?></td>
				</tr>
				<tr>
					<td>First Name:<span>*</span> </td>
					<td><input id="first_name" type="text" name="first_name" ></td>
					<td><span id="msg_first_name"></span></td>
				</tr>
				<tr>
					<td>Middle Name: </td>
					<td><input id="middle_name" type="text" name="middle_name" ></td>
					<td><span id="msg_middle_name"></span></td>
				</tr>
				<tr>
					<td>Last Name: <span>*</span></td>
					<td><input id="last_name" type="text" name="last_name" ></td>
					<td><span id="msg_last_name"></span></td>
				</tr>
				<tr>
					<td>Gender: <span>*</span></td>
					<td>
						<input id="male" type="radio" name="gender" value="male">Male
						<input id="female" type="radio" name="gender" value="female">Female
					</td>
					<td><span id="msg_gender"></span></td>
				</tr>
				<tr>
					<td>Country: <span>*</span></td>
					<td>
						<select id="country" name="country">
							<option value="">Select Country</option>
							<option value="pakistan">Pakistan</option>
							<option value="australia">Australia</option>
							<option value="france">France</option>
							<option value="bangladesh">Bangladesh</option>
							<option value="westindies">Westindies</option>
						</select>
					</td>
					<td><span id="msg_country"></span></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="regisration" value="Register">
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
</body>
</html>