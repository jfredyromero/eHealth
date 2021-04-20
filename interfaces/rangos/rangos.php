<?php
    $root = $_SERVER['DOCUMENT_ROOT']."/ehealth/static/php/conexion.php";
    include $root;  // Conexi�n tiene la informaci�n sobre la conexi�n de la base de datos.
    $mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>eHealth</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="/ehealth/static/css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="/ehealth/static/img/favicon.png">
    </head>
    <body background="/ehealth/static/img/background.jpg">
        <h1 id="home-title">eHealth: Dispositivo IoT</h1>
        <div id="home">
            <nav class="navbar navbar-expand-xl navbar-dark" style="background-color: #281E5D;">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/ehealth/interfaces/consultas/ultimos.php">
                                Últimos
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Consultas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/ehealth/interfaces/consultas/ultimos.php">Últimos</a>
                                <a class="dropdown-item" href="/ehealth/interfaces/consultas/fechas.php">Fechas</a>
                                <a class="dropdown-item" href="/ehealth/interfaces/consultas/dispositivos.php">Dispositivos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ehealth/interfaces/probabilidades/probabilidades.php">Probabilidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ehealth/interfaces/rangos/rangos.php">Rangos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><strong>Username</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Salir</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-content">
              <table width="80%" align=center cellpadding=5 border=1>
                  <tr>
                      <td valign="top" align=center width=80% colspan=6>
                          <img src="/ehealth/static/img/logo.png" width=800 height=250>
                      </td>
                  </tr>
                  <tr height=20>
                  </tr>
                  <tr>
                      <td valign="top" align=center width=80% colspan=6 bgcolor="#281E5D">
                          <h3>
                              <font color=white>¡Mueve el slider y selecciona el peso que cada variable tendrá sobre el cálculo de cada una de las enfermedades!</font>
                          </h3>
                      </td>
                  </tr>
                  <tr height=20>
                  </tr>
                  <tr>
                      <td valign="top" align=center width=80% colspan=6 bgcolor="#281E5D">
                          <h1>
                              <font color=white>Fiebre Amarilla</font>
                          </h1>
                      </td>
                  </tr>

                    <?php
                        if ((isset($_POST["enviado"]))){  // Ingresa a este if si el formulario ha sido enviado..., al ingresar actualiza los datos ingresados en el formulario, en la base de datos.
                            $enviado = $_POST["enviado"];
                            if ($enviado == "S_fiebre"){
                                $prob_temp_fiebre = $_POST["prob_temp_fiebre"];
                                $prob_hum_fiebre = $_POST["prob_hum_fiebre"];
                                $prob_lluvia_fiebre = $_POST["prob_lluvia_fiebre"];

                                $mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.
                                // la siguiente linea almacena en una variable denominada sql1, la consulta en lenguaje SQL que quiero realizar a la base de datos.
                                // se actualiza la tabla de valores m�ximos
                                $sql1 = "UPDATE datos_ponderados set prob_temp='$prob_temp_fiebre', prob_hum='$prob_hum_fiebre', prob_lluvia='$prob_lluvia_fiebre' where id=1";

                                $result1 = $mysqli->query($sql1);

                                if ($result1 == 1){
                                    $mensaje = "Datos actualizados correctamente";
                                }else{
                                    $mensaje = "Inconveniente actualizando datos";
                                }
                            }
                            if ($enviado == "S_dengue"){
                                $prob_temp_dengue = $_POST["prob_temp_dengue"];
                                $prob_hum_dengue = $_POST["prob_hum_dengue"];
                                $prob_lluvia_dengue = $_POST["prob_lluvia_dengue"];

                                $mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.
                                // la siguiente linea almacena en una variable denominada sql1, la consulta en lenguaje SQL que quiero realizar a la base de datos.
                                // se actualiza la tabla de valores m�ximos
                                $sql2 = "UPDATE datos_ponderados set prob_temp='$prob_temp_dengue', prob_hum='$prob_hum_dengue', prob_lluvia='$prob_lluvia_dengue' where id=2";

                                $result2 = $mysqli->query($sql2);

                                if ($result2 == 1){
                                    $mensaje = "Datos actualizados correctamente";
                                }else{
                                    $mensaje = "Inconveniente actualizando datos";
                                }
                            }
                            echo '<tr>
                                <td bgcolor="#EEEEFF" align=center colspan=6>
                                <font FACE="arial" SIZE=2 color="#000044"> <b>'.$mensaje.'</b></font>
                                </td>
                                </tr>';
                        }   // FIN DEL IF, si la variable enviado existe, que es cuando ya se env�o el formulario

                        // AQUI CONSULTA LAS PROBABILIDADES PARA PRESENTARLOS EN EL SLIDER
                        $mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.
                        // CONSULTA FIEBRE AMARILLA
                        $sql3 = "SELECT * from datos_ponderados where id=1";
                        $result3 = $mysqli->query($sql3);
                        $row3 = $result3->fetch_array(MYSQLI_NUM);
                        $prob_temp_fiebre = $row3[2];
                        $prob_hum_fiebre = $row3[3];
                        $prob_lluvia_fiebre = $row3[4];
                        // CONSULTA DENGUE
                        $sql4 = "SELECT * from datos_ponderados where id=2";
                        $result4 = $mysqli->query($sql4);
                        $row4 = $result4->fetch_array(MYSQLI_NUM);
                        $prob_temp_dengue = $row4[2];
                        $prob_hum_dengue = $row4[3];
                        $prob_lluvia_dengue = $row4[4];
                    ?>

                    <form method=POST action="rangos.php">
                        <tr>
                            <td style="height: 100px; justify-content: center; align-items: center;" colspan=6>
                                <div class="middle">
                                    <div class="multi-range-slider">
                                        <input type="range" class="input-left" min="0" max="100" value="<?php echo $prob_temp_fiebre; ?>">
                                        <input type="range" class="input-right" min="0" max="100" value="<?php echo 100-$prob_lluvia_fiebre; ?>">
                                        <div class="slider">
                                            <div class="l-track"></div>
                                            <div class="r-track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td bgcolor="#ffa420" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Temperatura:</b>
                                  <span class="l-percent"><?php echo $prob_temp_fiebre; ?>%</span>
                                  <input type="hidden" name="prob_temp_fiebre" value="<?php echo $prob_temp_fiebre; ?>">
                              </font>
                          </td>
                          <td bgcolor="#008f39" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Humedad:</b>
                                  <span class="m-percent"><?php echo $prob_hum_fiebre; ?>%</span>
                                  <input type="hidden" name="prob_hum_fiebre" value="<?php echo $prob_hum_fiebre; ?>">
                              </font>
                          </td>
                          <td bgcolor="#ADD8E6" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Precipitación:</b>
                                  <span class="r-percent"><?php echo $prob_lluvia_fiebre; ?>%</span>
                                  <input type="hidden" name="prob_lluvia_fiebre" value="<?php echo $prob_lluvia_fiebre; ?>">
                              </font>
                          </td>
                        </tr>
                        <tr>
                            <td bgcolor="#EEEEEE" align=center colspan=6>
                                <input type="hidden" name="enviado" value="S_fiebre">
                                <button style="background-color:#281E5D; color:white" value="Actualizar" type="submit" class="btn btn-lg" name="Actualizar"><i style="background-color:#281E5D; color:white" class="fas fa-sync"></i><span class="pl-3">Actualizar</span></button>
                            </td>
                        </tr>
                    </form>

                    <tr height=20>
                    </tr>

                    <tr>
                        <td valign="top" align=center width=80& colspan=6 bgcolor="#281E5D">
                            <h1>
                                <font color=white>Dengue</font>
                            </h1>
                        </td>
                    </tr>

                    <form method=POST action="rangos.php">
                        <tr>
                            <td style="height: 100px; justify-content: center; align-items: center;" colspan=6>
                                <div class="middle">
                                    <div class="multi-range-slider">
                                        <input type="range" class="input-left" min="0" max="100" value="<?php echo $prob_temp_dengue; ?>">
                                        <input type="range" class="input-right" min="0" max="100" value="<?php echo 100-$prob_lluvia_dengue; ?>">
                                        <div class="slider">
                                            <div class="l-track"></div>
                                            <div class="r-track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td bgcolor="#ffa420" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Temperatura:</b>
                                  <span class="l-percent"><?php echo $prob_temp_dengue; ?>%</span>
                                  <input type="hidden" name="prob_temp_dengue" value="<?php echo $prob_temp_dengue; ?>">
                              </font>
                          </td>
                          <td bgcolor="#008f39" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Humedad:</b>
                                  <span class="m-percent"><?php echo $prob_hum_dengue; ?>%</span>
                                  <input type="hidden" name="prob_hum_dengue" value="<?php echo $prob_hum_dengue; ?>">
                              </font>
                          </td>
                          <td bgcolor="#ADD8E6" valign="center" align=center colspan=2>
                              <font FACE="arial" SIZE=4>
                                  <b>Precipitación:</b>
                                  <span class="r-percent"><?php echo $prob_lluvia_dengue; ?>%</span>
                                  <input type="hidden" name="prob_lluvia_dengue" value="<?php echo $prob_lluvia_dengue; ?>">
                              </font>
                          </td>
                        </tr>
                        <tr>
                            <td bgcolor="#EEEEEE" align=center colspan=6>
                                <input type="hidden" name="enviado" value="S_dengue">
                                <button style="background-color:#281E5D; color:white" value="Actualizar" type="submit" class="btn btn-lg" name="Actualizar"><i style="background-color:#281E5D; color:white" class="fas fa-sync"></i><span class="pl-3">Actualizar</span></button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        <script src="/ehealth/static/js/slider.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    </body>
</html>
