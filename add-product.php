<?php 
     include "classes/functions.php";
      $Obj = new Employee();
	  $user_roll = $_SESSION['user_roll'];
	  $menuData = $Obj->getMenu($user_roll);
      if($_SESSION['authentic']==FALSE){
		  header('location:index.php');
	  }
	 
 $msg ='';
 $userRoll = $Obj->userRoll('user_roll');
 $brand = $Obj->getBrand();
 $categoryData = $Obj->Category("parent_category_id=0");
 
 if(isset($_POST['submit'])){
	 
	 $target_dir = "images/";
	 $file_name = $_FILES['image']['name'];
	 $file_tmp = $_FILES['image']['tmp_name'];	
	 $target_file = $target_dir.basename($file_name);
	 
	 $imagefiletype = pathinfo($file_name, PATHINFO_EXTENSION);
	 
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
	   $msg = "sorry, only jpg, jpeg, Png & gif files are allowed.";
		
	}else{
		move_uploaded_file($file_tmp,$target_file);
	}
	
	$param = [
			   'product_name'=>$_POST['product_name'],
			   'price'=>$_POST['price'],
			   'brand_id'=>$_POST['brand'],
			   'category_id'=>$_POST['scategory'],
			   'image'=>$file_name,
			   'description'=>$_POST['description'],  
			   'created_at'=>date('Y-m-d')
       ];
	   
	    $result = $Obj->addProducts('products',$param);
        //$result); die;		
		if($result['type']=='error'){
	        $msg = "<p class='text-danger center'>".$result['message']."</p>";
        }
        else{
	         header("location:product-list.php");    
       }
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

    <title>Add Product</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
   <div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Add Product</h1>
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	</div>
	  <div class="card-body">
       <form method="POST" name="validationForm" id="validationForm" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" class="form-control" id="product_name" value="<?php ?>" name="product_name" placeholder="Product Name">
		  <?php if(isset($msg)){echo $msg; } ?>
		</div>
		
		<div class="form-group">
		   <label for="brand" class="">Product Image</label><br>
			<input type="file" name="image"  id="image">
		</div>
		
		<div class="form-group">
		<label for="brand" class="Setting0Value">Brand</label><br>
		
			<select id="brand" name="brand">
			 <option>--Category--</option>
			  <?php while($blist= $brand->fetch_array()) { ?>
			        <option value="<?=$blist['brand_id']?>"><?=$blist['brand_name']?> </option>
			<?php  }  ?>			  		 
			</select>
		   </div>
				
		<div class="form-group">
		   <label for="price" class="">price</label><br>
			<input type="number" name="price"  id="price" value="<?php if(isset($_POST['price'])){echo $_POST['price']; } ?>">
		</div>
		
	    
		<div class="form-group">
		  <label for="Category" class="">Category</label><br>
			<select id="category" name="category">
			 <option>--Category--</option>
			  <?php while($clist = $categoryData->fetch_array()) { ?>
			        <option value="<?=$clist['category_id']?>"><?=$clist['category_name']?> </option>
			<?php  }  ?>			  		 
			</select>
		   </div>
		   
		   <div class="form-group">
		   <label for="scategory" class="">Sub Category</label><br>
			<select name="scategory" id="scategory">
			<option>--Category--</option>
					  		 
			</select>
		   </div>
		   
          
		<div class="form-group">
		 <label for="scategory" class="">Description</label><br>
			<textarea name="description" class="form-control" id="description" col="" rows=""></textarea>
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
 
 <script>
       
   $(document).ready(function(){
	$('#category').on('change', function(){
		var category = $(this).val();
		//alert(category);
		if(category){
			$.ajax({
				type:'POST',
				url:'get_ajax_category.php',
				data:'category='+category,
				success:function(html){
					$('#scategory').html(html);
					 
				}
			}); 
		}else{
			$('#scategory').hide();			
		   }
	   });	
	});
  </script>
</body>
</html>