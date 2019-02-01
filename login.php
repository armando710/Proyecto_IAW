<?php
if(!isset($_POST['login']) && !isset($_POST['pass'])){
    header('location:inicio.html');
}
if(empty($_POST['login'])==true && empty($_POST['pass'])==true){
   header('location:inicio.html');
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
    <title>TuMuro</title>
</head>
<body>
<?php
$mysql= new mysqli("localhost","geografia","a123");

if($mysql->select_db("proyecto_2")==1){
    $query="select nombre,password from usuarios;";
    $result=$mysql->query($query);
    while($fila=$result->fetch_assoc()){
        if ($_POST['login']==$fila['login'] && $_POST['pass']==$fila['password']){
            //echo "Base de Datos seleccionada. <br> ";
            echo "Bienvenido. <br> ";
            echo $fila['nombre'].' '.$fila['login']."<br>";
            echo "<a href='cerrar.php'>Lista de Usuarios</a> <br>";
            echo "<a href='inicio.html'>Volver al Inicio</a>";
            session_start();
            $_SESSION["user"]=1;
            break;

        }
    }if (!$_POST['login']==$fila['login'] && !$_POST['pass']==$fila['password']){
        header('location:inicio.html');
    }

}else{
    echo "Error al seleccionar la Base de Datos";
}

?>

</body>
</html>