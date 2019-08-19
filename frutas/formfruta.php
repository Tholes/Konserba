<?php include("../includes/header.html") ?>

    <body>
    <ul class="nav">
            <li class="nav nav-pills">
                <a class="nav-link active" href="../index.php" target ="info"><h4>Inicio</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="formfruta.php" target="info"><h4>Ingresar fruta</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../hortalizas/formhortaliza.php" target="info"><h4>Ingresar hortaliza</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../encargo/encargo.php" target="info"><h4>Solicitar encargo</h4></a>
            </li>
        </ul>
    <div class="col-6 px-6">
                <div class="card">
                    <div class="card-header">
                        Insertar fruta
                    </div>
        <div class="card-body">
        <div class="form">
        </div>
        <form action="formfrutap.php" method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-8 col-form-label">Nombre de la fruta: </label>
    <div class="col-sm-10">
      <input type="text" name="nombre" placeholder="Fruta">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-8 col-form-label">Costo por kilo: </label>
    <div class="col-sm-10">
      <input type="number" name="costo_por_kilo" placeholder="Costo">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-8 pt-0">Calidad:</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="calidad" id="gridRadios1" value="Premium" checked>
          <label class="form-check-label" for="gridRadios1">
            Premium
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="calidad" id="gridRadios2" value="Estandar">
          <label class="form-check-label" for="gridRadios2">
            Estándar
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
  </div>
</form>
    </body>
<?php include("../includes/footer.html") ?>