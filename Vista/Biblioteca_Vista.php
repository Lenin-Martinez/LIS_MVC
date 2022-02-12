<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="CSS/Index.css">
  <title>Biblioteca MVC</title>

 </head>

 <body>
  <h1>Buscar libro</h1>
  
<form method="post">
  <input type="text" name="txtTitulo" placeholder="Titulo del libro"><br><br>
  <input type="text" name="txtAutor" placeholder="Autor"><br><br>
  <input type="text" name="txtAnio" placeholder="Año"><br><br>
  <input type="text" name="txtGenero" placeholder="Genero"><br><br>
  <br>
  <input type="submit" name="btnBuscar" value="Buscar">
</form>


<h3>Resultados: </h3>
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
      foreach ($libros as $libro): ?>
        <tr>
          <td><?php echo $libro['Id']?></td>
          <td><?php echo $libro['Titulo']?></td>
          <td><?php echo $libro['Autor']?></td>
          <td><?php echo $libro['Anio']?></td>
          <td><?php echo $libro['Genero']?></td>
          <td><?php echo "$ " .number_format($libro['Precio'],2)?></td>
        </tr>
  <?php endforeach;} ?>

  </table>

  




</body>
</html>

