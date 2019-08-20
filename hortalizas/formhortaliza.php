<!DOCTYPE html>

<?php include("../includes/header.html") ?>
  
    <body>
    <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link " href="../index.php" target ="info"><h4>Inicio</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../frutas/formfruta.php" target="info"><h4>Ingresar fruta</h4></a>
            </li>
            <li class="nav nav-pills">
                <a class="nav-link active" href="formhortaliza.php" target="info"><h4>Ingresar hortaliza</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../encargo/encargo.php" target="info"><h4>Solicitar encargo</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../consultas/consulta.php" target="info"><h4>consultas</h4></a>
            </li>
        </ul>
            <div class="col-5 px-6">
                <div class="card">
                    <div class="card-header">
                        Insertar hortaliza
                    </div>
    <div class="card-body">
        <div class="form">
            </div>
                <form action="formhortalizap.php" method="POST">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-8 col-form-label">Nombre de la hortaliza: </label>
            <div class="col-sm-10">
                <input type="text" name="nombre" placeholder="Nombre hortaliza">
            </div>
        </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-8 col-form-label">Costo por unidad: </label>
        <div class="col-sm-10">
            <input type="number" name="costo_por_unidad" placeholder="Costo">
        </div>
    </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-8 pt-0">Calidad:</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipo_de_cultivo" id="gridRadios1" value="Huerta" checked>
          <label class="form-check-label" for="gridRadios1">
            Huerta
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipo_de_cultivo" id="gridRadios2" value="Regadio">
          <label class="form-check-label" for="gridRadios2">
            Regadio
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </div>
  </div>
    </form>
    </div>
</body>

<div class = "col-md-100">
    <table class = "table table-borderd">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Costo por unidad</th>
                <th>tipo cultivo</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <tbody>
        <form action="borrarHortaliza.php" method="POST">
            <?php
            require('../conexion/conexion.php');
            $query = "SELECT * FROM Hortaliza";
            $result = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td name='nombre'><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['costo_por_unidad'] ?></td>
                    <td><?php echo $row['tipo_de_cultivo'] ?></td>
                    <td>
                        <a href="./borrarHortaliza.php?nombre= <?php echo $row['nombre']?>" class = "btn btn-danger">
                            <i class = "fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php  } ?>
            </form>
        </tbody>
    </table>
</div>
</div>


<?php include("../includes/footer.html") ?>
