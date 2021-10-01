<?php

function videos(){
         
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
        
            $conten=substr($conten,strpos($conten,"https://fvs.io/redirector?token")+0);
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
        
        ///  mysqli_query($conexion,$serie);
           
                     // echo "insert into ('$posible_url', '$resul','$i','$foto','$foto','$resul','anime')";

       // print("</br>".$posible_url);
       
    }
     $serie="insert into `capitulos` (`id_capitulo`,`video`, `id_nombre`, `ban`, `nombre`, `capitulo` ) VALUES ('0','','supergirl','','supergirl','$j');";
  }
}

?>