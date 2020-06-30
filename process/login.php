<!DOCTYPE html>
<html style="background-color: #aba9a9; text-align: center">
<head>
    <title>Error</title>
    <?php include('../inc/link.php');  ?>
</head>
<body>
<br><br><br><br>
<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';
    sleep(2);
    $nombre=$_POST['nombre-login'];
    $clave=md5($_POST['clave-login']);
    $radio=$_POST['optionsRadios'];
    if(!$nombre==""&&!$clave==""){
        $verUser=ejecutarSQL::consultar("select * from cliente where Nombre='$nombre' and Clave='$clave'");
        $verAdmin=ejecutarSQL::consultar("select * from administrador where Nombre='$nombre' and Clave='$clave'");
        if($radio=="option2"){
            $AdminC=mysql_num_rows($verAdmin);
            if($AdminC>0){
                $_SESSION['nombreAdmin']=$nombre;
                $_SESSION['claveAdmin']=$clave;
                echo '<script> location.href="../configAdmin.php"; </script>';
            }else{
              echo '
              <img src="../assets/img/lhrpadel.png" style="width: 150px;">
              <br>
              <h2>Nombre de usuario o contraseña inválido</h2>
              <br>
              <a href="../index.php">Volver a iniciar sesión</a>
              '; 
            }
        }
        if($radio=="option1"){
            $UserC=mysql_num_rows($verUser);
            if($UserC>0){
                $_SESSION['nombreUser']=$nombre;
                $_SESSION['claveUser']=$clave;
                echo '<script> location.href="../index.php"; </script>';
            }else{
                echo '
              <img src="../assets/img/lhrpadel.png" style="width: 150px;">
              <br>
              <h2>Nombre de usuario o contraseña invalido</h2>
              <br>
              <a href="../index.php">Volver a iniciar sesión</a>
                ';
            }
        }

    }else{
        echo '
              <img src="../assets/img/lhrpadel.png" style="width: 150px;">
              <br>
              <h2>Campos Vacios</h2>
              <br>
              <a href="../index.php">Volver a iniciar sesión</a>
        ';
    }
?>
</body>
</html>    