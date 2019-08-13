<!DOCTYPE html>

<html>
    <head>
        <title>Formulario encargo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="form">
            <form action="formencargo.php" method="POST">
                <center><h1>Encargo</h1>
                    <p><h2>Número del encargo:</h2><input type="number" name="número_de_orden" placeholder="Número del encargo" required>
                    <br>
                    <br>
                    <h2>Fecha en la que se hizo el encargo:</h2>
                    <input type="date" name="fecha" placeholder="dd/mm/yyyy"  required><BR>
                    <br>
                    <br>
                    <h2>Valor:</h2> <input type="number" name="valor" placeholder="Valor del encargo" required>
                    <br>
                    <br>
                    <h2>Hortaliza:</h2>
                    <select name='hortaliza'>
                        <option value=NULL></option>
                        <?php
                        require('conexion.php');
                        $aux=NULL;
                        $sentencia = "SELECT * FROM Hortaliza";
                        $resultado = mysqli_query($conn, $sentencia);
                        while ($row1 = mysqli_fetch_array($resultado)):;
                            ?>
                            <option ><?php echo $row1[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <br>
                    <h2>Fruta:</h2>
                    <select name ='fruta'>
                        <option  value=NULL></option>
                        <?php
                        require('conexion.php');
                        $aux=NULL;
                        $sentencia2 = "SELECT * FROM Fruta";
                        $resultado3 = mysqli_query($conn, $sentencia2);
                        while ($row0 = mysqli_fetch_array($resultado3)):;
                            ?>
                            <option><?php echo $row0[0]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Enviar"></p></center>
            </form>
        </div>
    </body>
</html>