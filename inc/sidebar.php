<div class="vertical-menu">
  <a style="color: white" href="niu.php"><i class="fa fa-circle"></i> Pelotas Niu</a>
  <a style="color: white" href="mayorista.php"><i class="fa fa-tags"></i> Mayoristas/ Clubes</a>
  <div style="text-align: center">
    <br>
    <img src="assets/img/logodos.png" style="width: 30%; text-align: center;">
  </div>
  <hr>            
  <input type="text" class="form-control" id="usr" placeholder="Buscar" style="margin-top: 7px;">

  <h3>Categorías</h3>
    <div class="sidenav">

      <a class="categorias" href="index.php">Destacados</a>


      <a class="categorias" href="categorias.php?id=ACCE01">Accesorios </a>
      
      <a class="categorias" href="categorias.php?id=BOL01">Bolsos y Mochilas</a>
      
      
      <a class="categorias" href="categorias.php?id=CAL01">Calzado
        <i class="fa fa-caret-down"></i>
      </a>
      <div class="categorias dropdown-container">
        <?php             
        $marcas =  ejecutarSQL::consultar("select * from producto where CodigoCat='CAL01' group by Marca");
        while($marca=mysql_fetch_array($marcas)){
          echo '

          <a class="categorias" href="allproductmarca.php?id='.$marca[5].'&cod='.$marca[2].'">'.$marca[5].'</a>
          
          ';
        }
        ?>                    
      </div>
      
      <a class="categorias dropdown-btn" href="categorias.php?id=IND01">Indumentaria
        <i class="fa fa-caret-down"></i>
      </a>                  
      <div class="categorias dropdown-container">
        <?php             
        $marcas =  ejecutarSQL::consultar("select * from producto where CodigoCat='IND01' group by Marca");
        while($marca=mysql_fetch_array($marcas)){
          echo 
          '
          
          <a class="categorias" href="allproductmarca.php?id='.$marca[5].'&cod='.$marca[2].'">'.$marca[5].'</a>

          ';
        }
        ?>                    
      </div>


      <a class="categorias dropdown-btn" href="categorias.php?id=PAL01">Paletas/Palas 
        <i class="fa fa-caret-down"></i>
      </a>
      <div class="categorias dropdown-container">
        <?php             
        $marcas =  ejecutarSQL::consultar("select * from producto where CodigoCat='PAL01' group by Marca");
        while($marca=mysql_fetch_array($marcas)){
          echo 
          '
          
          <a class="categorias" href="allproductmarca.php?id='.$marca[5].'&cod='.$marca[2].'">'.$marca[5].'</a>

          ';
        }
        ?>
      </div>
    </div>
</div>