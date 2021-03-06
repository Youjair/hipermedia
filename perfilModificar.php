<?php
$title= "Perfil";
include("includes/head.php");

if(isset($_SESSION["remember"])==false){
  header("location: index.php");
  exit;
}
include("includes/headerC.php");

$sentencia = "select NomUsuario, Email, Sexo, FNacimiento, Ciudad, Foto, Pais
     from Usuarios u where $idUsu = idUsuario";
 $resultado = mysqli_query($bbdd, $sentencia);
 $fila = $resultado->fetch_assoc();

include_once("includes/errores.php");
?>

<p class="registro"> La contraseña debe tener entre 6 y 15 carácteres, mínimo una mayúscula, una minúscula y un número </p>
<p class="registro"> El nombre de usuario debe tener entre 3 y 15 carácteres, solo se permiten números y alfabeto inglés</p>
<main>


  <h1>Modificar datos</h1>

  <form action= "perfilModificarConfirmacion.php" method="POST">
    <p>
      <p>
        <label for="userName">Usuario: </label><input id="userName" name="nombre" type="text" required

        <?php if (isset($fila['NomUsuario'])) echo "value='".$fila['NomUsuario']."'"; ?>/>

      </p>
      <p>
        <label for="newPassword">Nueva contraseña: </label><input id="newPassword" name="newPass" type="password" required/>
        <label for="confirm">Confirmar contraseña: </label><input id="confirm" name="conPass" type="password" required/>
      </p>
      <p>
        <label for="email">Email: </label><input id="email" name="email" type="email" required
        <?php if (isset($fila['Email'])) echo "value='".$fila['Email']."'"; ?>/>

      </p>
      <p>
        <label for="gender">Genero: </label>
        <select id="gender" name="sexo">
          <option value="1" > Hombre</option>
          <option value="2"
          <?php if (isset($fila['Sexo'])&&$fila['Sexo']=="2") echo "selected"; ?>> Mujer</option>

        </select>
      </p>
      <p>
        <label for="birth" >Fecha de nacimiento: </label><input id="birth" type="date" name="fecha" required
        <?php if (isset($fila['FNacimiento'])) echo "value='".$fila['FNacimiento']."'"; ?>>
      </p>
      <p>
        <label for="city">Ciudad: </label>
        <input id="city" type="text" name="ciudad" placeholder="Ciudad"
        <?php if (isset($fila['Ciudad'])) echo "value='".$fila['Ciudad']."'"; ?>/>

        <label for="country">Pais: </label>
        <select id="country" name="pais" >

          <?php include("includes/paises.php"); ?>


        </select>
        Asegurese de elegir bien su país

      </p>
      <p>
        <label for="password">Contraseña actual: </label><input id="password" name="pass" type="password" required/>
      </p>
      <p>
        <button type="submit" name="button">Guardar cambios</button>

      </p>
    </form>
    <form action="menuperfil.php">
      <button type="submit" name="button">Volver</button>
    </form>
  </main>

  <?php include("includes/footer.php");?>
