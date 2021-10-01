<?php
$url="https://animeid.cc/";
$conten=file_get_contents($url);
$nombreDorama="";
$h="";
while(strpos($conten,"/ver/"))
            {
            $posible_url=substr($conten,strpos($conten,"/ver/"));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
           
            $conten=substr($conten,strpos($conten,"/ver/")+1);
            // $h=explode("/ver/",$posible_url);
               // $nombreDorama=$porciones = explode("-", $h[1]); 

            
           // $resul="";
            //$num=count($nombreDorama);
            //for($i=0; $i<$num; $i++)
           // $resul.="".$nombreDorama[$i]."";
            
         ///   $nombre=explode("",$h[1]);
            ///nombre en ->0 esta el nombre del anime
            ///nombre en ->1 esta el numero del capitulo
           // $resultado = str_replace(" ", "-", $nombre[0]);
          // echo $h[1];
           //echo $nombre[0];
            $dataName= FindImage();
            ///proceso para sacar capitulo//////
            $dataprevious=explode("/ver/",$posible_url);
            $episode=explode($dataprevious[1],$dataName);
            echo $episode[0];
            ////////////////////////////////////
                     ///  FindVideo($posible_url);



           //echo FindVideo($nombre[0],$nombre[1]);
           
        }
        function FindImage(){
          $nameDataAnime="";
         // getsuyoubi-no-tawawa-2.jpg
            $url="https://animeid.cc/";
            $conten=file_get_contents($url);
          $nombreDorama="";
          $h="";
        //print ("<textarea>".$conten."</textarea");
        while(strpos($conten,"https://cdn.animeflv.cc/cover/"))
        {
        $posible_url=substr($conten,strpos($conten,"https://cdn.animeflv.cc/cover/"));
        $pos_final=strpos($posible_url,'"');
        $pos2_final=strpos($posible_url,"'");
        if($pos2_final>0 && $pos2_final< $pos_final){
        $pos_final=$pos2_final;
        }
        $posible_url=substr($posible_url,0,$pos_final);
       
        $conten=substr($conten,strpos($conten,"https://cdn.animeflv.cc/cover/")+1);
        $nombreDorama=$porciones = explode("https://cdn.animeflv.cc/cover/", $posible_url);
        $nameDataAnime=explode(".jpg",$nombreDorama[1]);
             ///  return $posible_url;
           
            return $nameDataAnime[0];
            //echo $posible_url;
        }
        
    }
    function FindVideo($ur){
        $nom1="https://animeid.cc".$ur;
        $url=$nom1;
        
        //$resultado = str_replace(" ", "", $url);
       
        $conten=file_get_contents($url);
        $nombreDorama="";
        $h="";
      //print ("<textarea>".$conten."</textarea");
      while(strpos($conten,"//animeid.to/streaming.php?id="))
      {
      $posible_url1=substr($conten,strpos($conten,"//animeid.to/streaming.php?id="));
      $pos_final=strpos($posible_url1,'"');
      $pos2_final=strpos($posible_url1,"'");
      if($pos2_final>0 && $pos2_final< $pos_final){
      $pos_final=$pos2_final;
      }
      $posible_url1=substr($posible_url1,0,$pos_final);
     
      $conten=substr($conten,strpos($conten,"//animeid.to/streaming.php?id=")+1);
      }
          echo "</br>".$posible_url1."</br>";
    }
        set_time_limit(20000000);
        
?>