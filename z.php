<?php
  $url="https://animeid.cc/streaming.php?id=MTMx&title=Elfen+Lied+Episodio+4";
  $conten=file_get_contents($url);
  while(strpos($conten,"https://storage.googleapis.com/"))
   {
   $posible_url=substr($conten,strpos($conten,"https://storage.googleapis.com/"));
   $pos_final=strpos($posible_url,'"');
   $pos2_final=strpos($posible_url,"'");
   if($pos2_final>0 && $pos2_final< $pos_final){
   $pos_final=$pos2_final;
   }
   $posible_url=substr($posible_url,0,$pos_final);
  
   $conten=substr($conten,strpos($conten,"https://storage.googleapis.com/")+0);
   echo $conten;
}
?>