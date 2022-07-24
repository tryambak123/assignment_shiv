<?php
include "classes/functions.php";
$Obj = new Employee();
$msg ='';
if(isset($_POST['login'])){
	$userName = trim($_POST['userName']);
    $password = md5(trim($_POST['password']));
	$url=  "localhost/ElectronicShop/Api/index.php";

	$data = array("username" => $userName, "password" => $password, "option" => "login");
	$ch = curl_init( $url );
	# Setup request to send json via POST.
	$payload = json_encode( array( "customer"=> $data ) );

	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	# Return response instead of printing.
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	# Send request.
	$result = curl_exec($ch);
	$result = json_decode($result, true);
	curl_close($ch);
	# Print response.
	$msg = "<pre><p class='text-danger center'>". $result['message']. "</pre>";

}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>	
    <?php include('comman/comman_css.php'); ?>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">                         
                            <div class="col-lg-6">
                                <div class="p-5">
			<div class="text-center"><h1 class="h4 text-gray-900 mb-4">Admin Login</h1><?php if(isset($msg)){echo $msg; } ?></div>
			<form class="user" method="POST" name="validationForm" id="validationForm11">
				<div class="form-group">
					<input type="text" class="form-control" name="userName" id="userName" placeholder="username">
				</div>
				<div class="form-group">
				 <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>				
				   <input type="submit" name="login" value="Login" class="btn btn-primary">			   
				<hr>				
			</form>
                    
			<div class="text-center">
				<a class="small" href="register.php">Create an Account!</a>
			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
      <?php include('comman/comman_js.php'); ?>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	 <script src="js/formValidation.js"></script>
   
</body>

</html>