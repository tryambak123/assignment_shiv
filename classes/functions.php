<?php 

include 'config/dbconfig.php';
class Employee extends DB{	 

  public function AddEmployee($table,$param=array()){
	    $userName = $param['userName'];
	    $emaiid = $param['email'];		
	    $check = $this->checkUserExist($userName,$emaiid);
        $checkEmp = $check->num_rows;
        if($checkEmp >1){
		  return $error = ['type'=>'error','message'=>'This User Name Already Existed'];			
		}
		else{ 
			$field = implode(',', array_keys($param));
			$value = implode("','", array_values($param));		
			$sql = "INSERT INTO $table ($field) values('$value')"; 
			//echo $sql; die; 
		   $query = $this->mysqli->query($sql);	   
		   return $query; 
		}	   
	}
	
	
	public function addProducts($table,$param=array()){
		
	    $sql = "SELECT product_name FROM $table where product_name='".$param['product_name']."' ";
		$check = $this->mysqli->query($sql);
        $checkEmp = $check->num_rows;
        if($checkEmp >1){
		  return $error = ['type'=>'error','message'=>'This product Name Already Exist'];			
		}
		else{ 
			$field = implode(',', array_keys($param));
			$value = implode("','", array_values($param));		
			$sql = "INSERT INTO $table ($field) values('$value')"; 
			//echo $sql; die; 
		   $query = $this->mysqli->query($sql);	   
		   return $query; 
		}	   
	}
	
	public function AddCategory($table,$param=array()){
	    
	    $sql = "SELECT category_name FROM category where category_name='".$param['category_name']."' ";
		$check = $this->mysqli->query($sql);
        $checkCat = $check->num_rows;
        if($checkCat >0){
		  return $error = ['type'=>'error','message'=>'This Category Already Existed'];			
		}
		else{ 
			$field = implode(',', array_keys($param));
			$value = implode("','", array_values($param));		
			$sql = "INSERT INTO $table ($field) values('$value')"; 
		   $query = $this->mysqli->query($sql);	   
		   return $query; 
		}	   
	}
	
	public function editCategory($param=array(),$id){
	   $argm =array();
	   foreach($param as $key=>$value){
	   $argm[] = "$key='$value'";	   
	   }
	   $arguments = implode(',', $argm);	   
	   $sql = "update category set $arguments ";	
		if($id !=''){
				$sql .= " WHERE category_id='$id'";  
			  }	   
	   //echo $sql; die;	  
	   $query = $this->mysqli->query($sql);
	   if($query){
		       return $_SESSION['success'] = 'Category Update Successfuly';
	    }
	    return $query;	  
    }
	
	public function checkUserExist($userName,$emailid){
		$sql = "SELECT userName FROM employee where userName='".$userName."' ";
		$query = $this->mysqli->query($sql);
		return $query;
	}
	
	
	public function employee_login($userName,$password){				
	try{
		$sql = "SELECT id,userName,password,user_roll FROM employee where userName='".$userName."' and password='".$password."' ";
		 //echo $sql; die;
		$query = $this->mysqli->query($sql);
		 $recodeCheck =$query->num_rows;
		 if($recodeCheck >0){
			 $row = $query->fetch_array();
			  $_SESSION['authentic'] = true;
			  $_SESSION['uid'] = $row['id'];
			  $_SESSION['user_name'] = $row['userName'];
			  $_SESSION['user_roll'] = $row['user_roll'];				
			header('location:dashbord.php');
		 }
	 else{ 
		   return $error = ['type'=>'error','message'=>'This Username or Password not Match'];
		   }
	} catch(Exception $e){
		return $e->getMessage();
	}
	
	}
		
  public function editEmployee($param=array(),$id){
	   $argm =array();
	   foreach($param as $key=>$value){
	   $argm[] = "$key='$value'";	   
	   }
	   $arguments = implode(',', $argm);	   
	   $sql = "update employee set $arguments ";	
		if($id !=''){
				$sql .= " WHERE id='$id'";  
			  }	   
	   //echo $sql; die;	  
	   $query = $this->mysqli->query($sql);
	   if($query){
		       return $_SESSION['success'] = 'Employee Update Successfuly';
	    }
	    return $query;	  
    }
	
	
	public function changePassword($password,$id){	  
	   $sql = "update employee set password='".$password."' WHERE id='".$id."'";		
	   //echo $sql; die;	  
	   $query = $this->mysqli->query($sql);
	   if($query){
		    return $_SESSION['success'] = 'Password Changed Successfuly';
		   
	   }
	   
    }
	

  public function employeeList($userRoll){

      $sql = "SELECT * FROM employee";	  
	  if($userRoll=='Admin'){
		  $sql .= " WHERE user_roll !='Admin' AND status=1";  
	  }
	  
	  if($userRoll=='Manager'){
		  $sql .= " WHERE user_roll !='Admin' AND user_roll !='Manager' AND status=1";  
	  }
	  
	   if($userRoll=='senior_employee'){
		 $sql .= " WHERE user_roll !='Admin' AND user_roll !='Manager' AND user_roll !='senior_employee' AND status=1";  
	  }
	  
	  if($userRoll=='junior_employee'){
		 $sql .= " WHERE user_roll !='Admin' AND user_roll !='Manager' AND user_roll !='senior_employee' AND user_roll !='junior_employee'";  
	  }
	
	//echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query;
	
   }
    public function profile($rollName){		
	     $sql = "SELECT * FROM employee WHERE user_roll='$rollName'";
		 // echo $sql; die;
	     $query = $this->mysqli->query($sql);
	     return $query;
	
   }
   
    public function getRecodeByid($table,$where){		
	     $sql = "SELECT * FROM $table";
         if($where !=''){
     		$sql  .= " WHERE $where";
		 }
		 //echo $sql; die;
	     $query = $this->mysqli->query($sql);
	     return $query;
	
   }
   
  
   public function getMenu($roll){
	  $sql = "SELECT * FROM user_menu";
	 if($roll =='junior_employee') {
	     $sql .= " where menu_name !='Employee List' AND menu_name !='Category' AND menu_name !='Product'";
	 }
	 
	 if($roll =='senior_employee') {
	     $sql .= " where menu_name !='Employee List' AND menu_name !='Category'";
	 }
	$query = $this->mysqli->query($sql);
	return $query;
	
   }
   
   public function getUserRoll($rollId){
	$sql = "SELECT * FROM user_roll where roll_id='".$rollId."'";
	  //echo $sql; die;
	 $query = $this->mysqli->query($sql);
	 $profile = $query->fetch_array();
	return $profile;	
   }
 
   public function userRoll($table){
	$sql = "SELECT * FROM $table ORDER BY roll_name";
	//echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query;
   }
	
	
	 public function getBrand(){
		$sql = "SELECT * FROM tb_brand";
		//echo $sql; die;
		$query = $this->mysqli->query($sql);
		return $query;
   }
   
	public function getCategory(){
	$sql = "SELECT c1.category_name as Parent,c1.status, c2.category_name,c2.category_id FROM category c1 inner join category as c2 
	        ON c1.category_id=c2.parent_category_id";
	// echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query;
	
   }
   
   public function ProductList(){
	  $sql = "SELECT p.product_id, p.product_name, p.price, p.brand_id, p.category_id, p.image, p.description,
	  p.created_at, p.status, c.category_name, b.brand_name FROM products p 
	  LEFT JOIN category c ON c.category_id=p.category_id 
	  LEFT JOIN tb_brand as b ON p.brand_id=b.brand_id ORDER BY p.product_name DESC";
	// echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query; 
	   
   }
   
   
   public function Category($where=null){
	$sql = "SELECT * FROM category ";
	if($where !=''){
		$sql .=" WHERE $where";
	}
	// echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query;
	
   }
   
    public function getAjaxCategory($table,$where=null){	
	if($where !=''){
		$sql ="SELECT * FROM $table WHERE $where";
	}
	 //echo $sql; die;
	$query = $this->mysqli->query($sql);
	return $query;	
   }
   
  
   public function recodeDelete($table,$where){
	 $sql = "DELETE FROM $table";
    if($where !=''){
		$sql .= " WHERE $where";
	}	
	$query = $this->mysqli->query($sql);
	return true;  
	   
   }
   
}

?>
