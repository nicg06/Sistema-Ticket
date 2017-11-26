<?php

/*
Archivo donde se encuentran todas las funciones necesarias para el funcionamiento del sistema de ticket.
CRUD de Ticket 
CRUD de Usuarios o Agentes
*/

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
//**********************
//clase donde se realizara todas las funciones del sistema de tickets
//***********************
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
		$pass_php=md5($_POST['pass']);
		//echo "user=$user<br>pass_js=$pass_js<br>pass_php=$pass_php<br>";
		$sql="select * from usuario
			where 
			NOMBRE_USUARIO ='$user'
			and
			 PASSWORD='$pass_php'
		
			   and
			   ESTADO='activo'
		  ";
		//echo "$sql";
		$res=mysqli_query(Conectar::con(),$sql);
		//print_r($res); exit();
		if (($res->num_rows)==0)
		{
			echo "<script type='text/javascript'>
			alert('Los datos ingresados no existen en la base de datos');
			window.location='login.php';
			</script>";
		}else
		{
			//echo "si existen";
			if ($reg=mysqli_fetch_assoc($res))
			{
				$_SESSION["session_tickets"]=$reg["COD_USUARIO"];
				$_SESSION["ultima_conexion"]=date("Y-n-j H:i:s");
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
	  		   VALUES(NOW(),'$rtt','$_POST[tipo_inci]','$_POST[prioridad]','ABIERTO','$_POST[depto]','$_POST[usern]','$_POST[descrp]','$_POST[coment]')";

	    		//print_r($sql);
				//exit;

	    		$res=mysqli_query(Conectar::con(),$sql);
	    		//$rty=mysql_insert_id();
	     		//$rt=mysqli_error(Conectar::con());
	     		//print_r($rt);
				 //exit;

	    		if($res){
	    			echo "<script>javascript: alert('TICKET GUARDADO CON EXITO ');  window.location.href='tickets.php'</script>"; 
	    			 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL GUARDAR TICKET'); window.location.href='tickets.php'</script>"; 
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
                     	$sql2 = "UPDATE TICKET SET ESTADO='PENDIENTE', FECHA_ATENCION=NOW() WHERE ID_TICKET='$_POST[id_tk]'";
                     }elseif ($_POST['segid']==5) {
                     	$sql2 = "UPDATE TICKET SET ESTADO='CERRADO', FECHA_ATENCION=NOW() WHERE ID_TICKET='$_POST[id_tk]'";
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
	//Función para eliminar ticket
public function eliminar_ticket($id_ticket)
	{
		$sql="delete from ticket where ID_TICKET =$id_ticket";
		//print_r($sql); exit;
		$res=mysqli_query(Conectar::con(),$sql);
		if($res){
	    			echo "<script>javascript: alert('TICKET ELIMINADO CON EXITO ');  window.location.href='tickets.php'</script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL ELIMINAR TICKET'); window.location.href='tickets.php'</script>"; 
	    		}
		
	}

//***********************************************
	//Función para traer todos los tickets
public function traer_ticket()
{   
	//$euser=array();
	$tsql="SELECT A.*,B.*, C.NOMBRES,C.APELLIDOS,C.PERFIL FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO INNER JOIN usuario C ON A.COD_USUARIO=C.COD_USUARIO";
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
    	$tsq="SELECT A.*,(SELECT CONCAT(NOMBRES,' ',APELLIDOS) AS USERNAME FROM USUARIO WHERE COD_USUARIO=A.COD_USUARIO) AS USERNAME,B.* FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO WHERE ID_TICKET='$idp'";
    }elseif ($idst=='PENDIENTE' OR $idst=='CERRADO') {
    	$tsq="SELECT A.*,(SELECT CONCAT(NOMBRES,' ',APELLIDOS) AS USERNAME FROM USUARIO WHERE COD_USUARIO=A.COD_USUARIO) AS USERNAME ,B.*, D.* FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO INNER JOIN (SELECT ID_SEG,ID_TICKET,X.COD_USUARIO,FECHA_SEGUIMIENTO,SEG_COMENTARIO, NOMBRES, APELLIDOS,PERFIL FROM SEGUIMIENTO X 
    		INNER JOIN usuario Z ON X.COD_USUARIO=Z.COD_USUARIO) D ON A.ID_TICKET=D.ID_TICKET WHERE A.ID_TICKET='$idp'";

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

//***********************************************
	//Función para traer todos los usuarios
public function traer_usuarios()
{   
	//$euser=array();
	$tsql="SELECT * FROM USUARIO ";
	//$er="select * FROM PERSONAS";
	$res=mysqli_query(Conectar::con(),$tsql);

		while ($reg=mysqli_fetch_assoc($res))
		{
		
			$this->euser[]=$reg;
		}
			return $this->euser;
			
}


//***********************************************
	//Función para traer usuario por id
public function insertar_usuario()
{   
	//$euser=array();
	
	$tsql="INSERT INTO USUARIO (NOMBRES,APELLIDOS,TELEFONO,CORREO,PERFIL,TIPO,NOMBRE_USUARIO,PASSWORD,ESTADO)
					   VALUES('$_POST[nombre]','$_POST[apellido]','$_POST[telefono]','$_POST[email]','$_POST[perfil]','1','$_POST[username]','".md5($_POST['pass'])."','ACTIVO')";
	//$er="select * FROM PERSONAS";print_r($_POST); exit;
    //print_r($tsql); exit;
	$res=mysqli_query(Conectar::con(),$tsql);

	//$rt=mysqli_error(Conectar::con());
	//print_r($rt); exit;
	if($res){
	    			echo "<script>javascript: alert('USARIO GUARDADO CON EXITO ');  window.location.href='usuarios.php'</script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL GUARDAR USUARIO'); window.location.href='usuarios.php'</script>"; 
	    		}
			
}


//***********************************************
	//Función para editar usuario
public function editar_usuario()
{   
	//$euser=array();
	
	$tsql="UPDATE USUARIO SET NOMBRES='$_POST[nombre]',APELLIDOS='$_POST[apellido]',TELEFONO='$_POST[telefono]',CORREO='$_POST[email]',PERFIL='$_POST[perfil]',TIPO=1,NOMBRE_USUARIO='$_POST[username]',PASSWORD= '".md5($_POST[pass])."',ESTADO='$_POST[estado]' WHERE COD_USUARIO='$_POST[iduss]'";
	//$er="select * FROM PERSONAS";print_r($_POST); exit;
    //print_r($tsql); exit;
	$res=mysqli_query(Conectar::con(),$tsql);

	//$rt=mysqli_error(Conectar::con());
	//print_r($rt); exit;
	if($res){
	    			echo "<script>javascript: alert('USARIO EDITADO CON EXITO ');  window.location.href='usuarios.php'</script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL EDITAR USUARIO'); window.location.href='usuarios.php'</script>"; 
	    		}
			
}


//***********************************************
	//Función para eliminar usuario
public function eliminar_usuario($id_usuario)
	{
		$sql="delete from usuario where COD_USUARIO=$id_usuario";
		//print_r($sql); exit;
		$res=mysqli_query(Conectar::con(),$sql);
		if($res){
	    			echo "<script>javascript: alert('USARIO ELIMINADO CON EXITO ');  window.location.href='usuarios.php'</script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR Atraer_ticket_completosL ELIMINAR USUARIO'); window.location.href='usuarios.php'</script>"; 
	    		}
		
	}


//***********************************************
	//Función para traer numero de tickets atendidos
public function traer_ticket_completos()
	{
		$sqla="SELECT COUNT(*) AS COMPLETOS FROM ticket WHERE ESTADO='CERRADO'";
		$res=mysqli_query(Conectar::con(),$sqla);

		while ($reg=mysqli_fetch_assoc($res))
		{
		
			$this->euser[]=$reg;
		}
			return $this->euser;
			
}

//***********************************************
	//Función para traer numero de tickets pendientes
public function traer_ticket_pendietes()
	{
		$sqlp="SELECT COUNT(*) AS PENDIENTES FROM ticket WHERE ESTADO='PENDIENTE'";
		$resp=mysqli_query(Conectar::con(),$sqlp);

		while ($regp=mysqli_fetch_assoc($resp))
		{
		
			$this->pend[]=$regp;
		}
			return $this->pend;
			
}

//***********************************************
	//Función para traer numero de tickets sin atencion
public function traer_ticket_noatendidos()
	{
		$sqla="SELECT COUNT(*) AS ABIERTOS FROM ticket WHERE ESTADO='ABIERTO'";
		$resa=mysqli_query(Conectar::con(),$sqla);

		while ($rega=mysqli_fetch_assoc($resa))
		{
		
			$this->sinat[]=$rega;
		}
			return $this->sinat;
			
}

//***********************************************
	//Función para eliminar usuario
public function traer_tickets_all()
	{
		$sqlt="SELECT COUNT(*) AS TICKETS FROM ticket";
		$rest=mysqli_query(Conectar::con(),$sqlt);

		while ($regt=mysqli_fetch_assoc($rest))
		{
		
			$this->todo[]=$regt;
		}
			return $this->todo;
			
}



//***********************************************
	//Función para GRAFICA
public function data_grafica()
	{
		$sqlG="SELECT COUNT(*) AS CANT, B.NOMBRE_USUARIO FROM TICKET A INNER JOIN usuario B ON A.COD_USUARIO=B.COD_USUARIO GROUP BY B.NOMBRE_USUARIO";
		$resG=mysqli_query(Conectar::con(),$sqlG);

		while ($regG=mysqli_fetch_assoc($resG))
		{
		
			$this->todoG[]=$regG;
		}
			return $this->todoG;
			
}


//***********************************************
	//Función para GRAFICA
public function traer_deptos()
	{
		$sqlG="SELECT * FROM DEPARTAMENTO ";
		$resG=mysqli_query(Conectar::con(),$sqlG);

		while ($regG=mysqli_fetch_assoc($resG))
		{
		
			$this->todoG[]=$regG;
		}
			return $this->todoG;
			
}



//***********************************************
	//Función para GRAFICA
public function insert_depto()
	{
		$sqlD="INSERT INTO DEPARTAMENTO(NOMBRE, AREA) VALUES('$_POST[nombredp]','$_POST[areadp]') ";
		$res=mysqli_query(Conectar::con(),$sqlD);

	//$rt=mysqli_error(Conectar::con());
	//print_r($rt); exit;
	if($res){
	    			echo "<script>javascript: alert('DEPARTAMENTO GUARDADO CON EXITO ');  window.location.href='departamentos.php'</script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL GUARDAR DEPARTAMENTO'); window.location.href='departamentos.php'</script>"; 
	    		}
			
			
}


//***********************************************
	//Función para traer  tickets atendidos
public function traer_tickets_cerrados()
	{
		//$euser=array();
	$tsql="SELECT A.*,B.*, C.NOMBRES,C.APELLIDOS,C.PERFIL FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO INNER JOIN usuario C ON A.COD_USUARIO=C.COD_USUARIO  WHERE A.ESTADO='CERRADO'";
	//$er="select * FROM PERSONAS";
	$res=mysqli_query(Conectar::con(),$tsql);

		while ($reg=mysqli_fetch_assoc($res))
		{
		
			$this->euser[]=$reg;
		}
			return $this->euser;
			
}

//***********************************************
	//Función para traer  tickets atendidos
public function traer_tickets_pendientes()
	{
		//$euser=array();
	$tsql="SELECT A.*,B.*, C.NOMBRES,C.APELLIDOS,C.PERFIL FROM TICKET A INNER JOIN DEPARTAMENTO B ON A.ID_DEPTO=B.ID_DEPTO INNER JOIN usuario C ON A.COD_USUARIO=C.COD_USUARIO  WHERE A.ESTADO='PENDIENTE'";
	//$er="select * FROM PERSONAS";
	$res=mysqli_query(Conectar::con(),$tsql);

		while ($reg=mysqli_fetch_assoc($res))
		{
		
			$this->euser[]=$reg;
		}
			return $this->euser;
			
}

}// fin de clase Trabajo
?>