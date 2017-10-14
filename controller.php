<?php
require_once("class/class.php");

if (isset($_POST) and $_POST["flagprod"]=="10")
{
	
	//print_r($_FILES);
	$tra=new trabajo();
	$tra->insert_ticket();
	//print_r($_POST);
	exit;
}elseif (isset($_POST) and $_POST["flagprod"]=="15")
{
	//print_r($_FILES);
	$tra=new trabajo();
	//$tra->editar_producto();
	print_r($_POST);
	exit;
}else
{
echo "No recive ningún dato";
}

?>