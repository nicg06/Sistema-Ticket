<?php
//session_start();
//require_once("resize.php");
class Conectar
{
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
class Trabajo 
{


public function traer_persona()
{
	$er="select * FROM PERSONAS";
	$res=mysqli_query(Conectar::con(),$er);
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->user[]=$reg;
		}
			return $this->user;

}


public function insert_ticket()
{
  
       $rtt= 'TK'.date('his');
	   $sql = "INSERT INTO TICKET(FECHA_ALTA,COD_TICKET,TITULO_TICKET,PRIORIDAD,ESTADO,ID_DEPTO,COD_USUARIO,DESCRIPCION, COMENTARIO)  
	  		   VALUES(NOW(),'$rtt','$_POST[tipo_inci]','$_POST[prioridad]','PENDIENTE','$_POST[depto]','10','$_POST[descrp]','$_POST[coment]')";

	    		
	    		$res=mysqli_query(Conectar::con(),$sql);
	    		//$rty=mysql_insert_id();
	     		//$rt=mysqli_error(Conectar::con());
	     		//print_r($rt);
				 //exit;

	    		if($res){
	    			echo "<script>javascript: alert('PRODUCTO GUARDADO CON EXITO '); location.href(); window.location.href='tickets.php'></script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL GUARDAR PRODUCTO'); location.href(); window.location.href='tickets.php'></script>"; 
	    		}
	

	        
	# code...
}


public function editar_ticket()
{
  
 
	   $sql = "INSERT INTO SEGUIMIENTO (ID_TICKET,COD_USUARIO,FECHA_SEGUIMIENTO,SEG_COMENTARIO)
	   		   VALUES('$_POST[id_tk]','1',NOW(),'$_POST[seguimiento]')";

	    		//print_r($sql);
				//exit;
	    		$res=mysqli_query(Conectar::con(),$sql);
	    		//$rty=mysql_insert_id();
	    		if($res){
                     
                     if ($_POST['segid']==2) {
                     	$sql2 = "UPDATE A SET ESTADO='PENDIENTE' FROM TICKET WHERE ID_TICKET='$_POST[id_tk]'";
                     }elseif ($_POST['segid']==5) {
                     	$sql2 = "UPDATE A SET ESTADO='CERRADO' FROM TICKET WHERE ID_TICKET='$_POST[id_tk]'";
                     }
                     $res2=mysqli_query(Conectar::con(),$sql);


	    			echo "<script>javascript: alert('PRODUCTO EDITADO CON EXITO '); location.href(); window.location.href='tickets.php'></script>"; 
	    		}else{
	    			echo "<script>javascript: alert('ERROR AL EDITAR PRODUCTO'); location.href(); window.location.href='tickets.php'></script>"; 
	    		}
	

	        
	# code...
}

//$user = array();
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





	public function get_datos_usuario($id_usuario)
	{
		$sql="select * from usuarios where id_usuario=$id_usuario";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->user[]=$reg;
		}
			return $this->user;
	}
}

?>