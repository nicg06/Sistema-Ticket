<?php
require_once("class/class.php");



if (isset($_POST["flagprod"]) and $_POST["flagprod"]=="10")
{

	//print_r($_FILES);
	$tra=new trabajo();
	$tra->insert_ticket();
	//print_r($_POST);
	exit;
}elseif (isset($_POST["flagprod"]) and $_POST["flagprod"]=="15")
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
}elseif (isset($_POST["flagprod"]) and $_POST["flagprod"]=="20")
{
	//print_r($_FILES);
	$tra=new trabajo();
	$tr=$tra->insertar_usuario();

	print_r($tr);
	exit();
	if ($tr==1) {
		echo "<script>alert('SEGUIMIENTO DE TICKET GUARDADO'); window.location.href='tickets.php'</script>"; 
	}else{
		echo "<script>alert('ERROR INGRESAR SEGUIMIENTO DE TICKET'); window.location.href='tickets.php'</script>"; 
	}
	exit;
}elseif (isset($_POST["flagprod"]) and $_POST["flagprod"]=="25")
{
	//print_r($_FILES);
	$tra=new trabajo();
	$tr=$tra->editar_usuario();

	print_r($tr);
	exit();
	if ($tr==1) {
		echo "<script>alert('SEGUIMIENTO DE TICKET GUARDADO'); window.location.href='tickets.php'</script>"; 
	}else{
		echo "<script>alert('ERROR INGRESAR SEGUIMIENTO DE TICKET'); window.location.href='tickets.php'</script>"; 
	}
	exit;
}elseif (isset($_GET["flagprod"]) and $_GET["flagprod"]=="32")
{
	//print_r($_FILES);
	$tra=new trabajo();
	$tr=$tra->eliminar_usuario($_GET["idusuario"]);

	print_r($tr);
	exit();
	
	
}elseif (isset($_GET["flagprod"]) and $_GET["flagprod"]=="39")
{
	//print_r($_FILES);
	$tra=new trabajo();
	$tr=$tra->eliminar_ticket($_GET["idticket"]);

	print_r($tr);
	exit();

	exit;
}else
{
echo "No recive ningún dato";
}

?>