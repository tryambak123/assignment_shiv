<?php 
     include "classes/functions.php";
      $Obj = new Employee();
	  
      if($_SESSION['authentic']==FALSE){
		  header('location:index.php');
	  }
	 
 $msg ='';
  $uroll = $_SESSION['user_roll'];
  $menuData = $Obj->getMenu($uroll);
 if(isset($_POST['submit'])){
	$param = [
			   'name'=>$_POST['name'],
			   'userName'=>$_POST['userName'],
			   'password'=>md5(trim($_POST['password'])),
			   'email'=>$_POST['email'],
			   'phone'=>$_POST['phone'],
			   'gender'=>$_POST['gender'],
			   'dob'=>$_POST['dob'],  
			   'address'=>$_POST['address'],
			   'user_roll'=>$_POST['user_roll']
       ];
	   
	    $result = $Obj->AddEmployee('employee',$param);
        //$result); die;		
		if($result['type']=='error'){
	        $msg = "<p class='text-danger center'>".$result['message']."</p>";
        }
        else{
	         header("location:employee-list.php");    
       }
  }

  $userRoll = $Obj->userRoll('user_roll');
  
 ?>	  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Employee</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
   <div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Add Employee</h1>
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	</div>
	  <div class="card-body">
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
			<select name="user_roll" class="form-control" id="user_roll">
			<option>--Select--</option>
			  <?php while($roll = $userRoll->fetch_array()) {			       
			        echo"<option value='".$roll['roll_name']."'>".$roll['roll_name']."</option>";
			      }
			  ?>			  		 
			</select>
		      </div>		
	           <input type="submit" name="submit" value="Register" class="btn btn-primary">
	          </form>
			</div>
         </div>
        </div>
       </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 <?php include('comman/comman_js.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	 <script src="js/formValidation.js"></script>
</body>

</html>