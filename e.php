<?php

$posible_url="";
for($j=1; $j<=15;$j++){
  $nombreDorama="";
$h="";     
// $prueba=$_POST['prueba'];
$url="https://pelisplushd.net/serie/supergirl/temporada/3/capitulo/".$j;
$conten=file_get_contents($url);

        //print ("<textarea>".$conten."</textarea");
        while(strpos($conten,"https://image.tmdb.org/t/p/original/"))
        {
        $posible_url=substr($conten,strpos($conten,"https://image.tmdb.org/t/p/original/"));
        $pos_final=strpos($posible_url,'"');
        $pos2_final=strpos($posible_url,"'");
        if($pos2_final>0 && $pos2_final< $pos_final){
        $pos_final=$pos2_final;
        }
        $posible_url=substr($posible_url,0,$pos_final);
       
        $conten=substr($conten,strpos($conten,"https://image.tmdb.org/t/p/original/")+1);
        //$h=explode(".jpg",$posible_url);
        //$nombreDorama=$porciones = explode("https://image.tmdb.org/t/p/original/", $h[0]);
     
      //$nombreOriginal=explode("-",$nombreDorama[1]);

    // $resul="";
      //$num=count($nombreOriginal);
      //for($i=0; $i<$num; $i++)
      //$resul .= " ".$nombreOriginal[$i];
           
        //echo "\n" .$posible_url."\n";
        //echo "</br>";
        //echo "\n" .$resul."\n";
        //echo "</br>";
      
     // echo "insert into ('$posible_url','$resul','$o')";
   }
  // prueba($posible_url);
   videos($posible_url);
  }
   function prueba($imagen){
    $url="https://ww1.animeflv.cc/anime/".$nombreDorama;
    $conten=file_get_contents($url);
    $i1=0;
 
         //print ("<textarea>".$conten."</textarea");
         while(strpos($conten,"/".$nombreDorama."-"))
         {
         $posible_url=substr($conten,strpos($conten,"/".$nombreDorama."-"));
         $pos_final=strpos($posible_url,'"');
         $pos2_final=strpos($posible_url,"'");
         if($pos2_final>0 && $pos2_final< $pos_final){
         $pos_final=$pos2_final;
         }
         $posible_url=substr($posible_url,0,$pos_final);
        
         $conten=substr($conten,strpos($conten,"/".$nombreDorama."-")+1);
         $i1++;
    
         
         //videos($i1,$nombreDorama);
     }  
   //  echo "</br>".$i1."</br>";
    
}
   
         
             function fotos($img){
                  $im=$img;
                  return $im;
             }
           
     
   function videos($imagen){
         $serie="";
         for($j=1; $j<=15;$j++){
          $url="https://pelisplushd.net/serie/supergirl/temporada/3/capitulo/".$j;
          $conten=file_get_contents($url);
        //print ("<textarea>".$conten."</textarea");
        while(strpos($conten,"https://fvs.io/redirector?token"))
        {
        $posible_url=substr($conten,strpos($conten,"https://fvs.io/redirector?token"));
        $pos_final=strpos($posible_url,'"');
        $pos2_final=strpos($posible_url,"'");
        if($pos2_final>0 && $pos2_final< $pos_final){
        $pos_final=$pos2_final;
        }
        $posible_url=substr($posible_url,0,$pos_final);
        
            $conten=substr($conten,strpos($conten,"https://fvs.io/redirector?token")+1);
            echo $posible_url;
           // $nom=explode("-",$nombreDorama);
           // $resul="";
         //   $num=count($nom);
      //for($j=0; $j<$num; $j++)
     // $resul .= " ".$nom[$j];
       //   $foto="https://img.animeflv.cc/cover/".$nombreDorama.".jpg";
       //   $usuario = "root";
///$password = "";
///$servidor = "localhost";
///$basededatos = "anime";
//$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
//$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
          $serie="insert into `capitulos` (`id_capitulo`,`video`, `id_nombre`, `ban`, `nombre`, `capitulo` ) VALUES ('0','','supergirl','$imagen','supergirl','$j');";
        ///  mysqli_query($conexion,$serie);
           
                     // echo "insert into ('$posible_url', '$resul','$i','$foto','$foto','$resul','anime')";

       // print("</br>".$posible_url);
       
    }
   
  }
    echo"</br>".$serie."</br>";
   // $usuario = "root";
    //$password = "";
    //$servidor = "localhost";
    //$basededatos = "anime";
   //$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
    //$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    $insertar = "insert into `principal`(`id_anime`,`nombre`, `img`, `id_nombre`,`categoria`,`des`) VALUES ('0','supergirl','$imagen','$resul','pelicula','$j');";
    echo"</br>".$insertar."</br>";
    //mysqli_query($conexion,$insertar);
    set_time_limit(20000000);

   }
    //echo $i1;
   
   
//}
?>
