<?php
if (isset($_POST['nombre']) && !empty(($_POST['nombre'])) &&
    isset($_POST['apellido1']) && !empty(($_POST['apellido1'])) &&
    isset($_POST['apellido2']) && !empty(($_POST['apellido2'])) &&
    isset($_POST['login']) && !empty(($_POST['login'])) &&
    isset($_POST['pass']) && !empty(($_POST['pass'])) &&
    isset($_POST['pass2']) && !empty(($_POST['pass2'])) &&
    $_POST['pass']==$_POST['pass2']){

    $nom=$_POST['nombre'];
    $ap1=$_POST['apellido1'];
    $ap2=$_POST['apellido2'];
    $log=$_POST['login'];
    $p1=$_POST['pass'];
    $p2=$_POST['pass2'];



    $mysql= new mysqli("localhost","geografia","a123");
    if($mysql->select_db("proyecto_2")==1){
        $query="INSERT INTO usuarios (nombre, apellido1, apellido2, login, password, password2) 
        values ('$nom','$ap1','$ap2','$log','$p1','$p2')";

        if($mysql->query($query) === true){
            echo "<a href='inicio.html'>Volver al Inicio</a>";
        }else{
            die("Error al insertar datos: ". $mysql->error);
        }
    }
}else{
    header('location:registro.php');
}