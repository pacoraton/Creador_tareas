<?php
include("db.php");

//Comprobanmos si se envio la informacion por medio del metodo post(boton submit)
if(isset($_POST['guardar'])){

    //Obtenemos los datos insertados en el formulario por medio de la propiedad name
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];

    //Consulta a la base de datos      
     $query="INSERT INTO task(titulo,descripcion) VALUES ('$titulo', '$descripcion')";

     $resultado=mysqli_query($conn,$query);
     
     //comprobamos que se haya guardado ok
      if($resultado>=1){
          //echo " se guardo ok";
          //Redirigimos al index

        $_SESSION['mensaje']='Se ha agregado una nueva tarea';
        $_SESSION['estado']='success';

          header("Location:index.php");

      }else{
          die("Error en la consulta");
      }


}

?>