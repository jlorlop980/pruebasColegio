<?php
$servidor="localhost";
$usuario="root";
$clave= "";
$bd="colegio";
try {
$conn = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $clave);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Conexión satisfactoria";
}
catch(PDOException $e)
{
echo ( "Error de conexión: " . $e->getMessage());
}
?>