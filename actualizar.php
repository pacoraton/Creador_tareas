<?php
include("db.php");


if(isset($_GET['id'])){
    $id=$_GET['id'];

 
    //Consulta 
    $query="SELECT * FROM task WHERE id = $id";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){

        //echo "tu puedes editar";

        $row=mysqli_fetch_array($result); 
        $title=$row['titulo'];
        $description=$row['descripcion'];
        
        //echo $title;
        //echo $description; 

    }

}



if(isset($_POST['Update'])){
    echo "updating";

    $id=$_GET['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];

    //echo $title;
    //echo $description;
    //echo $id;

    $query="UPDATE task SET titulo='$title',descripcion='$description' where id=$id ";
    mysqli_query($conn,$query);


    $_SESSION['mensaje']="Se actualizo correctamente";
    $_SESSION['estado']="warning";      
    header('Location:index.php');
}

?>

<?php include("includes/header.php") ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="actualizar.php?id=<?php echo $_GET["id"]; ?>" method="post">
                    <div class="form group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualiza el titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Actualiza la descripcion"> <?php echo $description; ?></textarea>
                    </div>
                    <button class=" btn btn-success" name="Update">
                        Update
                    </button>    

                </form>
            </div>   

        </div>
    </div>   
</div>




<?php include('includes/footer.php');?>

<?php

    /*
    //Revisamos los datos que queremos editar 
    if(mysqli_num_rows($resultado)==1){
        $row=mysqli_fetch_array($resultado); 
        $titulo=$row['titulo'];
        $descripcion=$row['descripcion'];

        //echo $title.$descripcion;

    }      
}
if(isset($_POST['update'])){
    //echo "actualizando";
    $id=$_GET['id'];
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];



    $query="UPDATE task SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id";
    mysql_query($conn,$query);

  
    $_SESSION['mensaje']="Se ha actualizado el registro";
    $_SESSION['estado']="warning";

    header('Location:index.php');
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body>">
            <form action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Edita el titulo" value="<?php echo $titulo; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $descripcion ?></textarea>
                    </div>
                    <button class="btn btn-success "  name="update">Guardar</button> 
            </form>
            </div>
        </div>   
    </div>
</div>

<?php include('includes/footer.php');
*/

?>