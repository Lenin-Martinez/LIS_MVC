<?php
   function ConexionBD(){
      $user='root';
      $password = '';
      $db = 'LIS_MVC_Biblioteca';
  
      return new PDO('mysql:host=localhost;dbname='.$db, $user, $password);
   }



   function BuscarLibro($Titulo, $Autor, $Anio, $Genero){
      
      $Consulta='SELECT * FROM Libros ';
      $Contador = 0;

      //Condicion del titulo
      if(!empty($Titulo) && ($Contador == 0))
      {
         $Consulta .= "WHERE Titulo LIKE '" .$Titulo. "%' ";
         $Contador++;
      }
      else if(!empty($Titulo) && ($Contador > 0))
      {
         $Consulta .= "AND Titulo LIKE '" .$Titulo. "%' ";
      }

      //Condicion del Autor
      if(!empty($Autor) && ($Contador == 0))
      {
         $Consulta .= "WHERE Autor LIKE '" .$Autor. "%' ";
         $Contador++;
      }
      else if(!empty($Autor) && ($Contador > 0))
      {
         $Consulta .= "AND Autor LIKE '" .$Autor. "%' ";
      }

      //Condicion del Año
      if(!empty($Anio) && ($Contador == 0))
      {
         $Consulta .= "WHERE Anio = '" .$Anio. "' ";
         $Contador++;
      }
      else if(!empty($Anio) && ($Contador > 0))
      {
         $Consulta .= "AND Anio = '" .$Anio. "' ";
      }

      //Condicion del Genero del libro
      if(!empty($Genero) && ($Contador == 0))
      {
         $Consulta .= "WHERE Genero LIKE '" .$Genero. "%' ";
         $Contador++;
      }
      else if(!empty($Genero) && ($Contador > 0))
      {
         $Consulta .= "AND Genero LIKE '" .$Genero. "%' ";
      }
     
      $Conexion = ConexionBD();
      $result = $Conexion->query($Consulta);
      $libros = array();
      while ($libro = $result->fetch())
      {
         $libros[] = $libro;
      }
      return $libros;
   }
?>