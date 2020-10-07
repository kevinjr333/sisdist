<?php 
if(isset($_POST['usuario'])&&isset($_POST['contra']))//me permite verificar si los campos enviados no estan bacios
{
	//$tipo=$_GET['tipo'];
	$usuario=$_POST['usuario'];
    $pwd=$_POST['contra'];
	$conec=mysqli_connect("192.168.1.229","root","");//la direccion del servidor base de datos,el usuario,la contraseña
	mysqli_select_db($conec,"servicont");//se escoje la la base de datos a usar(la conexion de base de datos,y la tabla a usar)	
	$very_dat="SELECT * from usuario WHERE Usuario='$usuario'AND Password='$pwd'";//la consula sql para ver los registros de los usuario 
	$datos=mysqli_query($conec,$very_dat);//encapsula la consulta en datos (la conexion de base de datos y  la cadena sql )
	$usua=mysqli_fetch_array($datos);
	if(!$usua['Usuario']){//comparamos si usar es diferente de id quiere decir q si no esta la id en la base de datos vuelve a cargar el formulario 
		header("location:SesionError.html");	//sino existe te devuelve al login
		//echo "weoror";
	}
	else//y si encuentra un id q exsite en la tabla manda a iniciar la sesion
	{  
		header("location:1/index.html");
				
	}
}
?>