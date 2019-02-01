<?php
session_start();
if(!isset($_SESSION["user"])){
    header('location:inicio.php');
}
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <title>Document</title>
</head>
<body>
<?php
$mysql= new mysqli("localhost","geografia","a123");

if($mysql->select_db("proyecto_2")==1){
    $query="select * from usuarios;";
    $result=$mysql->query($query);
    while($fila=$result->fetch_assoc()){
        echo "<h1>Usuario".' '.$fila['id']."</h1>";
        echo $fila['nombre'].' '.$fila['apellido1']."<br>";
    }
}
echo "<a href='cerrar.php'>Cerrar Sesion</a>";

?>
</body>
</html>