<?php
session_start(); //iniciamos la sesion del usuario

class Conectar  
{
	//funicon para hacer las conexiones a la base de datos
	public static function con()
	{
		$con=mysqli_connect("localhost","root","");
		//mysqli_query ("SET NAMES 'utf8'");
		mysqli_select_db($con,"tikect_hd");
		return $con;
	}
//**********************************************************************************************
//Función para invertir fecha
public static function invierte_fecha($fecha){
	$dia=substr($fecha,8,2);
	$mes=substr($fecha,5,2);
	$anio=substr($fecha,0,4);
	$correcta=$dia."-".$mes."-".$anio;
	return $correcta;
	}

}
//clase donde se realizara todas las funciones del sistema de tickets
class Trabajo 
{



private $nombre=array();
	
	//***********************************************
	//Función para que el usuario se loguee
	public function logueo()
	{
		//$nombre=$_POST[""];
		$user=$_POST["user"];
		$pass_js=$_POST["pass"];
		//$pass_php=md5($_POST["pass"]);
		//echo "user=$user<br>pass_js=$pass_js<br>pass_php=$pass_php";
		$sql="select * from usuario
			where 
			NOMBRE_USUARIO ='$user' 
			and
			 PASSWORD='$pass_js'
			 -- and 
			 -- pass_php='$pass_php'
			   and
			   ESTADO='activo'
		  ";
		echo "$sql";
		$res=mysqli_query(Conectar::con(),$sql);
		if (mysqli_num_rows($res)==0)
		{
			echo "<script type='text/javascript'>
			alert('Los datos ingresados no existen en la base de datos');
			//window.location='index.php';
			</script>";
		}else
		{
			//echo "si existen";
			if ($reg=mysqli_fetch_assoc($res))
			{
				$_SESSION["session_tickets"]=$reg["COD_USUARIO"];
				header("Location: tickets.php");
			}
		}
	}

//***********************************************
	//Función para traer informacion del usuario logeado
public function get_datos_usuario($id_usuario)
	{
		$sql="select * from usuario where COD_USUARIO=$id_usuario";
		$res=mysqli_query(Conectar::con(),$sql);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->nombre[]=$reg;
		}
			return $this->nombre;
	}




//***********************************************
	//Función para insertar un nuevo ticket

public function insert_ticket()
{
  
       $rtt= 'TK'.date('his');
	   $sql = "INSERT INTO TICKET(FECHA_ALTA,COD_TICKET,TITULO_TICKET,PRIORIDAD,ESTADO,ID_DEPTO,COD_USUARIO,DESCRIPCION, COMENTARIO)  
	  		   VALUES(NOW(),'$rtt','$_POST[tipo_inci]','$_POST[prioridad]','ABIERTO','$_POST[depto]','10','$_POST[descrp]','$_POST[coment]')";

	    		
	    		$res=mysqli_query(Conectar::con(),$sql);
	    		//$rty=mysql_insert_id();
	     		//$rt=mysqli_error(Conectar::con());
	     		//print_r($rt);
				 //exit;

	    		if($res){
	    			echo "<script>javascript: alert('TICKET GUARDADO CON EXITO ');  window.location.href='tickets.php'></script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL GUARDAR TICKET'); window.location.href='tickets.php'></script>"; 
	    		}
	

	        
	# code...
}

//***********************************************
	//Función para que el editar ticket e ingresa seguimiento
public function editar_ticket()
{
  //Se enviara un tecnico para revision del equipo
 
	   $sql = "INSERT INTO SEGUIMIENTO (ID_TICKET,COD_USUARIO,FECHA_SEGUIMIENTO,SEG_COMENTARIO)
	   		   VALUES('$_POST[id_tk]','1',NOW(),'$_POST[seguimiento]')";

	    		//print_r($sql);
				//exit;
	    		$res=mysqli_query(Conectar::con(),$sql);
	    		//$rty=mysql_insert_id();
	    		if($res){
                     
                     if ($_POST['segid']==2) {
                     	$sql2 = "UPDATE TICKET SET ESTADO='PENDIENTE' WHERE ID_TICKET='$_POST[id_tk]'";
                     }elseif ($_POST['segid']==5) {
                     	$sql2 = "UPDATE TICKET SET ESTADO='CERRADO' WHERE ID_TICKET='$_POST[id_tk]'";
                     }
                     //print_r($sql2);
                     //exit;
                     $res2=mysqli_query(Conectar::con(),$sql2);
                     
                     if ($res2) {
                     	return 1;

                     }else{
                     	return 2;
                     	}	    			
	    		}else{
	    			return 2;
	    			
	    		}
	

	        
	# code...
}

//***********************************************
	//Función para traer todos los tickets
public function traer_ticket()
{   
	//$euser=array();
	$tsql="SELECT * FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO";
	//$er="select * FROM PERSONAS";
	$res=mysqli_query(Conectar::con(),$tsql);

		while ($reg=mysqli_fetch_assoc($res))
		{
		
			$this->euser[]=$reg;
		}
			return $this->euser;
			
}


//***********************************************
	//Función para traer un ticket en especifico por id
public function traer_ticket_id($idp, $idst)
{
    if ($idst=='ABIERTO') {
    	$tsq="SELECT * FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO WHERE ID_TICKET='$idp'";
    }elseif ($idst=='PENDIENTE' OR $idst=='CERRADO') {
    	$tsq="SELECT * FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO 
		  INNER JOIN SEGUIMIENTO C ON A.ID_TICKET=C.ID_TICKET WHERE A.ID_TICKET='$idp'";

    }
	//print_r($tsq);
	//exit;

	$res=mysqli_query(Conectar::con(),$tsq);
		while ($reg=mysqli_fetch_assoc($res))
		{
			
			$this->user[]=$reg;
		}
			return $this->user;
			
}


}
?>