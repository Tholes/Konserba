<?php include("../includes/header.html") ?>

<body>
    <ul class="nav">
            <li class="nav-item">
                <a class="nav-link " href="../index.php" target ="info"><h4>Inicio</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../frutas/formfruta.php" target="info"><h4>Ingresar fruta</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../hortalizas/formhortaliza.php" target="info"><h4>Ingresar hortaliza</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../encargo/encargo.php" target="info"><h4>Solicitar encargo</h4></a>
            </li>
            <li class="nav nav-pills">
                <a class="nav-link active" href="consulta.php" target="info"><h4>Consultas</h4></a>
            </li>
    </ul>
</body>

<div class = "container p-4">

    <div class = "row">

        <div class = "col-md-4"> 

            <div class = " card card-body">

                <div class = "form-group">

                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link " href="./consulta1.php" target ="info"><h4>Encargos vacíos</h4></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="consulta2.php" target ="info"><h4>La fruta más encargada</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="consulta3.php" target ="info"><h4>Encargos superiores a los 5000</h4></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class = "cold-md-8">
            </body>
            <div class = "col-md-8">
            <table class = "table table-borderd">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Calidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('../conexion/conexion.php');
                    $query = "select nombre,calidad
                    from fruta natural join (
                    select fruta as nombre
                    from encargo
                    group by fruta
                    having count(*) = (
                        select count(*)
                        from encargo
                        group by fruta
                        order by count(*) desc
                        limit 1
                    ) 
                    ) s;";

                    $result = mysqli_query($conn,$query);
                    
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['calidad'] ?></td>
                        </tr>
                    <?php  } ?>

                </tbody>
            </table>
    </div>
    </div>
</div>
<?php include("../includes/footer.html") ?>