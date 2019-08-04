<?php include("db.php");?>
<?php include("includes/header.php");?>

<div class="container p-4">
    

    <div class="row">

        <div class="col-md-4">

     <!--comprobacion para obtener los mensajes -->

        <?php if(isset($_SESSION["mensaje"])){ ?>

            <div class="alert alert-<?=$_SESSION['estado'] ?>  alert-dismissible fade show" role="alert">
             <!-- nota tambien puede ser < ?=$_SESSION['mensaje'] (junto) -->   
             <?php echo $_SESSION['mensaje'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>

       <?php session_unset(); } ?>
         


            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar tarea"> 
                </form>
            </div>

        </div>


        <div class="col-md-8">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Descripción</td>
                        <td>Fecha creacion</td>
                        <td>Acciones </td>
                    </tr>   
                </thead>
                <tbody>
                    
                   <?php
                        //consulta a la bd
                        $query="SELECT * FROM task";
                        $Resultado=mysqli_query($conn,$query);

                        //ciclo while para recorrer todas las tareas y tener un row por vuelta
                        while($row=mysqli_fetch_array($Resultado)){ ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td width="150px">
                                    <a class='btn btn-secondary' href="actualizar.php?id=<?php echo $row['id'] ?>"><i class="fas fa-edit"></i></a>
                                
                                    <a class='btn btn-danger' href="borrar.php?id=<?php echo $row['id'] ?>"><i class="far fa-trash-alt"></i></a>
                                </td>

                            </tr>


                        <?php }
                    ?>


                </tbody>


            </table>
        
        
        </div>

    </div>



</div>


<?php include("includes/footer.php");?>






   














