<?php
//$url="https://ww1.animeflv.cc/anime/a-channel";
//$conten=file_get_contents($url);
//$i1=0;

            //print ("<textarea>".$conten."</textarea");
            /*while(strpos($conten,"/a-channel-"))
            {
            $posible_url=substr($conten,strpos($conten,"/a-channel-"));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
           
            $conten=substr($conten,strpos($conten,"/a-channel-")+1);
            $i1++;
          
        }  
        while(strpos($conten,"type "))
            {
            $posible_url=substr($conten,strpos($conten,"type "));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
           
            $conten=substr($conten,strpos($conten,"type ")+0);
         //   echo $posible_url;
          
        }  */

        //echo $i1;
        for($i=1; $i<=20; $i++){

             $url = "https://pelisplushd.net/serie/supergirl/temporada/1/capitulo/".$i;
            $conten=file_get_contents($url);
            //print ("<textarea>".$conten."</textarea");
            while(strpos($conten,"https://www132.ff-01.com/token="))
            {
            $posible_url=substr($conten,strpos($conten,"https://www132.ff-01.com/token="));
            $pos_final=strpos($posible_url,'"');
            $pos2_final=strpos($posible_url,"'");
            if($pos2_final>0 && $pos2_final< $pos_final){
            $pos_final=$pos2_final;
            }
            $posible_url=substr($posible_url,0,$pos_final);
            
                $conten=substr($conten,strpos($conten,"https://www132.ff-01.com/token=")+0);

            

           // print("</br>".$posible_url);
        
        }

        }
        echo "</br>". $serie="insert into `capitulos` (`id_capitulo`,`video`, `id_nombre`, `ban`, `nombre`, `capitulo` ) VALUES ('0','$posible_url','supergirl','','supergirl','$i');"."</br>";

        echo "</br>". $insertar = "insert into `principal`(`id_anime`,`nombre`, `img`, `id_nombre`,`categoria`,`des`) VALUES ('0','supergirl','','supergirl','serie','');"."</br>";


          

?>