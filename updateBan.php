<?php
for($j=7; $j<=16;$j++){
    // $prueba=$_POST['prueba'];
    $url="https://www5.jkanime.video/tipo/anime?page=".$j;
    $conten=file_get_contents($url);
    $nombreDorama="";
    $h="";
            //print ("<textarea>".$conten."</textarea");
            while(strpos($conten,"https://img.animeflv.cc/cover/"))
            {
            $posible_url=substr($conten,strpos($conten,"https://img.animeflv.cc/cover/"));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
           
            $conten=substr($conten,strpos($conten,"https://img.animeflv.cc/cover/")+1);
            $h=explode(".jpg",$posible_url);
            $nombreDorama=$porciones = explode("https://img.animeflv.cc/cover/", $h[0]);
         
          FindBannerAndUpdate($nombreDorama[1]);
         
         // echo "insert into ('$posible_url','$resul','$o')";
       }
       set_time_limit(20000000);

    }
       function FindBannerAndUpdate($nombreA){
        $url="https://animeonline.ninja/online/".$nombreA;
        $conten=file_get_contents($url);
        while(strpos($conten,"https://image.tmdb.org/t/p/w780/"))
            {
            $posible_url=substr($conten,strpos($conten,"https://image.tmdb.org/t/p/w780/"));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
           
            $conten=substr($conten,strpos($conten,"https://image.tmdb.org/t/p/w780/")+1);
            $nombreOriginal=explode("-",$nombreA);

            $resul="";
            $num=count($nombreOriginal);
            for($i=0; $i<$num; $i++)
            $resul .= " ".$nombreOriginal[$i];
       }
       echo "</br>";
          echo "update `capitulos` SET `ban`='".$posible_url."' WHERE nombre='".$resul."';";
      echo "</br>";
        }
?>