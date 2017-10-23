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
	$tr=$tra->editar_ticket();
	if ($tr==1) {
		echo "<script>alert('SEGUIMIENTO DE TICKET GUARDADO'); window.location.href='tickets.php'</script>"; 
	}else{
		echo "<script>alert('ERROR INGRESAR SEGUIMIENTO DE TICKET'); window.location.href='tickets.php'</script>"; 
	}
	exit;
}else
{
echo "No recive ningún dato";
}

?>