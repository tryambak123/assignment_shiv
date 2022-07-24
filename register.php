<?php
 include "classes/functions.php";
 $Obj = new Employee();
 $msg ='';
 if(isset($_POST['submit'])){
	$param = [
			   'name'=>$_POST['name'],
			   'userName'=>trim($_POST['userName']),
			   'password'=>md5(trim($_POST['password'])),
			   'email'=>$_POST['email'],
			   'phone'=>$_POST['phone'],
			   'gender'=>$_POST['gender'],
			   'dob'=>$_POST['dob'],  
			   'address'=>$_POST['address'],
			   'user_roll'=>$_POST['user_roll_id']
       ];
	   
	    $result = $Obj->AddEmployee('employee',$param);
        //$result); die;		
		if($result['type']=='error'){
	        $msg = "<p class='text-danger center'>".$result['message']."</p>";
        }
        else{
	         header("location:index.php");    
       }
  }

  $userRoll = $Obj->userRoll('user_roll');
  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">    
    <title>Register</title>
    <?php include('comman/comman_css.php'); ?>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">                 
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account! </h1>
								
                            </div>
	<form method="POST" name="validationForm" id="validationForm" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
		</div>
		
		<div class="form-group">
			<input type="text" name="userName" class="form-control" id="userName" placeholder="User Name">
			<?php if(isset($msg)){echo $msg; } ?>
		</div>
		
		<div class="form-group">
			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		</div>
		
		<div class="form-group">
			<input type="email" name="email" class="form-control" id="email"
				placeholder="email">
		</div>
		
		<div class="form-group">
			<input type="number" name="phone" class="form-control" id="phone"
				placeholder="phone">
		</div>
		
		<div class="form-group">
		  <label for="gender">Gender : </label>
			Male <input type="radio" name="gender" value="M" id="gender">
			Filame <input type="radio" name="gender" value="F" id="gender">
		</div>
		
		<div class="form-group">
			<input type="date" name="dob" class="form-control" id="dob" placeholder="(dd-mm-yy)">
		</div>
		
		<div class="form-group">
			<input type="text" name="address" class="form-control" id="address" placeholder="Address">
		</div>
	    
		<div class="form-group">
		<label for="User Roll" class="">User Roll</label>
			<select name="user_roll_id" class="form-control" id="user_roll_id">
			  <?php while($roll = $userRoll->fetch_array()) { 
			      echo"<option value='".$roll['roll_name']."'>".$roll['roll_name']."</option>";
			  }
			  ?>			  		 
			</select>
		</div>		
	   <input type="submit" name="submit" value="Register" class="btn btn-primary">
	</form>
                            <hr>                           
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
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
	<script>
	  $(document).ready(function(){
		  //alert('adsfadsfd');
		  
	  });
	</script>
</body>
</html>