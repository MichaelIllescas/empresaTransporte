<?php
 session_start();

//esta funcion debe controlar las credenciales, y devolver true si son correctas o false, si no lo son. Adeams en caso de validar la sesion asignara los valores a utilizar en la variable global Session 


if($_POST["usuario"]=="jona" && $_POST["clave"]=="123"){
    
    header("Location: ../index.php");
    exit;
}else{
    header("Location: ../login.php");
    exit;
}




?>