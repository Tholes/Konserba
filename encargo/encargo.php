
<?php include("../includes/header.html") ?>


    <body>
    <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php" target ="info"><h4>Inicio</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../frutas/formfruta.php" target="info"><h4>Ingresar fruta</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../hortalizas/formhortaliza.php" target="info"><h4>Ingresar hortaliza</h4></a>
            </li>
            <li class="nav nav-pills">
                <a class="nav-link active" href="encargo.php" target="info"><h4>Solicitar encargo</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../consultas/consulta.php" target="info"><h4>Consultas</h4></a>
            </li>
        </ul>
        <div class="col-6 px-10">
                <div class="card">
                    <div class="card-header">
                        Solicitar encargo
                    </div>
                    <div class="card-body">
             
        <div class="form">
            <form action="formencargo.php" method="POST">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-8 col-form-label">Número del encargo: </label>
                        <div class="col-sm-10">
                            <input type="number" name="numero_de_orden" placeholder="número encargo...">
                        </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-10 col-form-label">Fecha de encargo: </label>
                        <div class="col-sm-10">
                            <input type="date" name="fecha" placeholder="dd/mm/yyyy">
                        </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-8 col-form-label">Valor: </label>
                        <div class="col-sm-10">
                            <input type="number" name="valor" placeholder="Valor del encargo...">
                        </div>
                        </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-8 col-form-label">Elija una Hortaliza,fruta ó ninguna de las dos </label>
                    </div>
                    <h5>Hortaliza:</h5>
                    <select name='hortaliza'>
                        <option></option>
                        <?php
                        require('../conexion/conexion.php');
                        $aux=NULL;
                        $sentencia = "SELECT * FROM Hortaliza";
                        $resultado = mysqli_query($conn, $sentencia);
                        while ($row1 = mysqli_fetch_array($resultado)):;
                            ?>
                            <option ><?php echo $row1[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <h5>Fruta:</h5>
                    <select name ='fruta'>
                        <option></option>
                        <?php
                        require('../conexion/conexion.php');
                        $aux=NULL;
                        $sentencia2 = "SELECT * FROM Fruta";
                        $resultado3 = mysqli_query($conn, $sentencia2);
                        while ($row0 = mysqli_fetch_array($resultado3)):;
                            ?>
                            <option><?php echo $row0[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class = "col-md-100">
    <table class = "table table-borderd">
        <thead>
            <tr>
                <th>Numero del encargo</th>
                <th>Fecha de encargo</th>
                <th>Valor</th>
                <th>Fruta</th>
                <th>Hortaliza</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('../conexion/conexion.php');
            $query = "SELECT * FROM encargo";
            $result = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['numero_de_orden'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['valor'] ?></td>
                    <td><?php echo $row['fruta'] ?></td>
                    <td><?php echo $row['hortaliza'] ?></td>
                    <td>
                        <a href="./borrarencargo.php?numero_de_orden= <?php echo $row['numero_de_orden']?>" class = "btn btn-danger">
                            <i class = "fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php  } ?>

        </tbody>
    </table>
</div>


<?php include("../includes/footer.html") ?>
