<!DOCTYPE html>
<html lang="es">
  
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/EstiloInicial.css">
  <title>Biblioteca MVC</title>
 </head>

 <body>

<div class="divDatosTexto">
  <div class="divParametros">
    <h1>Buscar libro</h1>
    <form method="post">
      <input type="text" name="txtTitulo" placeholder="Titulo del libro"><br><br>
      <input type="text" name="txtAutor" placeholder="Autor"><br><br>
      <input type="text" name="txtAnio" placeholder="Año"><br><br>
      <input type="text" name="txtGenero" placeholder="Genero"><br><br>
      <br>
      <input type="submit" name="btnBuscar" value="Buscar">
    </form>
  </div>


  <div class="divResultados">
    <h3>Libros encontrados: </h3>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>TITULO</th>
        <th>AUTOR</th>
        <th>AÑO</th>
        <th>GENERO</th>
        <th>PRECIO</th>
      </tr>
              <?php 
              if(isset($_POST["btnBuscar"])){
                
                $Titulo= $_POST["txtTitulo"];
                $Autor= $_POST["txtAutor"];
                $Anio= $_POST["txtAnio"];
                $Genero= $_POST["txtGenero"];

                $libros = BuscarLibro($Titulo, $Autor, $Anio, $Genero);
                $infoLibro='';
                $infoAutor='';
                $Contador=0;

                foreach ($libros as $libro): 
                  if($Contador == 0)
                  {
                    $infoLibro = $libro['Titulo'];
                    $infoAutor = $libro['Autor'];
                  }
              ?>
                    <tr>
                      <form method="post">
                        <td><?php echo $libro['Id']?></td>
                        <td><?php echo $libro['Titulo']?></td>
                        <td><?php echo $libro['Autor']?></td>
                        <td><?php echo $libro['Anio']?></td>
                        <td><?php echo $libro['Genero']?></td>
                        <td><?php echo "$ " .number_format($libro['Precio'],2)?></td>
                      </form>
                    </tr>
              <?php 
                  $Contador++;
                  endforeach;
                

                  $imgLibros = BuscarLibro($infoLibro,'','','');
                  $imgAutores = BuscarAutor($infoAutor);
                }
              ?>
    </table>

  </div>
</div>





<div class="divResultadoComplemento">
   
<div class="divSinopsis">
    <?php 
    //Muestra de informacion sobre el libro
      $img='';
      $Titulo = '';
      $Sinopsis='';
    if(isset($_POST["btnBuscar"])){
          foreach($imgLibros as $imgLibro):
            $img = $imgLibro['img'];
            $Titulo = $imgLibro['Titulo'];
            $Sinopsis = $imgLibro['Sinopsis'];
    ?>

    <div class="divFotoSinopsis">
      <img src=<?php echo $img?>
      alt="Foto del autor"
      width="300" 
      heigth="">
    </div>

    <div class="divSinopsisTexto">
      <br><?php echo $Titulo?></br>
      <p>
        <?php echo $Sinopsis; endforeach;} ?>
      </p>
    </div>
  </div>












  <div class="divAutor">
 
  <?php 
    //Muestra de informacion sobre el libro
      $img='';
      $Autor = '';
      $Biografia='';
    if(isset($_POST["btnBuscar"])){
          foreach($imgAutores as $imgAutor):
            $img = $imgAutor['img'];
            $Autor = $imgAutor['Autor'];
            $Biografia = $imgAutor['Biografia'];
    ?>

    <div class="divFotoAutor">
      <img src=<?php echo $img?> 
      alt="Foto del autor"
      width="300" 
      heigth="">
    </div>

    <div class="divBiografia">
      <br><?php echo $Autor?></br>
      <p>
        <?php echo $Biografia; endforeach;} ?>
      </p>
    </div>
  </div>





</div>
</body>
</html>

