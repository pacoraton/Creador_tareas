<?php
include("db.php");

$id=$_GET['id'];

//echo $id;

$query ="DELETE FROM task WHERE id=$id";
$Resultado=mysqli_query($conn,$query);

if($Resultado){

    $_SESSION['mensaje']="Tarea eliminada correctamente";
    $_SESSION['estado'] ="danger";   

    header('Location:index.php');
}else{
  die("Error ");
}

?>