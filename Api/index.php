<?php
//error_reporting(E_ALL);
include "classes/functions.php";
$obj = new Employee();
header("Content-Type:application/json");
$data = json_decode(file_get_contents('php://input'), true);
$customer = $data['customer'];

$result = $obj->employee_login($customer['username'],$customer['password']);
$result['msg'] = 'Hello world';
if($result['type']=='error'){
	echo json_encode($result);
}
?>