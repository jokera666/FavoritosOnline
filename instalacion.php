<?php 

//CREAR UNA TABLA DE FAVORITOS-----------------------------------

//Conexion

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";


//Crear tabla


 $bd = mysql_select_db("Favoritos",$conexion);
 if (!$bd) 
 {
 	die("La base de datos no existe".mysql_error());
 }
 else echo "La base de datos existe<br>";

$favoritos = "CREATE TABLE Favoritos
(
	usuario CHAR(40) NOT NULL,
	#PRIMARY KEY(id_obra),
	contrasena CHAR(50) NOT NULL,
	titulo CHAR(40) NOT NULL,
	#FOREIGN KEY (Propietario) REFERENCES usuario(DNI),
	direccion CHAR(100) NOT NULL,
	categoria CHAR(40),
	comentario CHAR(200),
	valoracion INT
)";



$tab = mysql_query($favoritos,$conexion); // mysql_query = lo que enviamos y a que conexion lo enviamos
if(!$tab) die("La tabla no fue creada".mysql_error()); // comprobacion si se ha creado la tabla correctamente
else echo "la tabla fue creada correctamente";

//Insertar conenido en la tabla

mysql_select_db("favoritos",$conexion);
mysql_query("INSERT INTO favoritos VALUES('pruebaF1' , 'prueba' , 'Google' , 'http://www.google.com' , 'Tecnologia' , 'La pagina mas famosa' , 10)");
mysql_query("INSERT INTO favoritos VALUES('pruebaF2' , 'prueba' , 'ABV' , 'http://www.abv.bg' , 'Correo' , 'Correo electronico bulgaro' , 4)");
mysql_query("INSERT INTO favoritos VALUES('pruebaF3' , 'prueba' , 'gmail' , 'http://www.gmail.com' , 'Correo electronico internacional' , 'el mejor' , 10)");

//Cerrar conexion
mysql_close($conexion);

//CREAR UNA TABLA DE USUARIOS-------------------------------------

//Conexion


$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";

//Crear tabla


 $bd1 = mysql_select_db("Favoritos",$conexion);
 if (!$bd1) 
 {
 	die("La base de datos no existe".mysql_error());
 }
 else echo "La base de datos existe<br>";

$usuarios = "CREATE TABLE Usuarios
(
	usuario CHAR(40) NOT NULL,
	contrasena CHAR(50) NOT NULL,
	nombre CHAR(40) NOT NULL,
	apellido CHAR(100) NOT NULL,
	edad INT,
	permisos INT
)";


$tab1 = mysql_query($usuarios,$conexion); // mysql_query = lo que enviamos y a que conexion lo enviamos
if(!$tab1) die("La tabla no fue creada".mysql_error()); // comprobacion si se ha creado la tabla correctamente
else echo "la tabla fue creada correctamente";


//Insertar conenido en la tabla
mysql_select_db("usuarios",$conexion);
mysql_query("INSERT INTO usuarios VALUES('usuarioU1' , 'prueba' , 'Nestor' , 'Edrev' , 24 , 3)");
mysql_query("INSERT INTO usuarios VALUES('usuarioU2' , 'prueba' , 'Monica' , 'Belucci' , 50 , 2)");
mysql_query("INSERT INTO usuarios VALUES('usuarioU3' , 'prueba' , 'Bratt' , 'Pitt' , 49 , 1)");

//Cerrar conexion

mysql_close($conexion);

//CREAR UNA TABLA DE LOGS-----------------------------------------

//Conexion

$conexion = mysql_connect("localhost","root","");
if(!$conexion) die("No se ha podido realizar la conexion".mysql_error());
else echo "La conexion se ha realizado correctamente<br>";

//Crear tabla

 $bd2 = mysql_select_db("Favoritos",$conexion);
 if (!$bd2) 
 {
 	die("La base de datos no existe".mysql_error());
 }
 else echo "La base de datos existe<br>";

$logs = "CREATE TABLE Logs
(
	utc INT,
	anio INT,
	mes INT,
	dia INT,
	hora INT,
	minuto INT,
	ssegundo INT,
	ip CHAR(50),
	navegador CHAR(100),
	usuario CHAR(40),
	contrasena CHAR(40)
)";

$tab3 = mysql_query($logs,$conexion); // mysql_query = lo que enviamos y a que conexion lo enviamos
if(!$tab3) die("La tabla no fue creada".mysql_error()); // comprobacion si se ha creado la tabla correctamente
else echo "la tabla fue creada correctamente";

//Insertar conenido en la tabla

mysql_select_db("logs",$conexion);
mysql_query("INSERT INTO logs VALUES(000000000 , 2014 , 04 , 23 , 13 , 59 , 30 , '127.0.0.1' , 'Chrome' , 'usuarioU1'  , 'prueba')");

//Cerrar conexion
mysql_close($conexion);




 ?>