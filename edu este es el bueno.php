<?php
    set_time_limit(20000000);
  $usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "anime";
  $nombreDorama="";
  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
$h="";     
$guardaGenero="";
$guardaBanner="";
$guardaDes="";
$nombreDorama="";
// $prueba=$_POST['prueba'];
$posible_url="";
for($j=1; $j<=1;$j++){
  set_time_limit(20000000);

$url="https://www5.jkanime.video/directorio?sort=fecha&type%5B%5D=1&status=&years=&orden=DESC&page=".$j;
$conten=file_get_contents($url);

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
      // no he podido solucionar xd 
        try {
      $h=explode(".jpg",$posible_url);
        $nombreDorama=$porciones = explode("https://img.animeflv.cc/cover/", $h[0]);
      } catch (Exception $e) {
        $h=explode(".png",$posible_url);
        $nombreDorama=$porciones = explode("https://img.animeflv.cc/cover/", $h[0]);
      }
     // explode 
     //https://img.animeflv.cc/cover/imagen-temporad-1.jpg
     // $h= explode(.jpg, $variable)
     //$h[0]=https://img.animeflv.cc/cover/imagen-temporad-1;
     // $nombreDorama=explode("https://img.animeflv.cc/cover/",$h[0])
     // $nombreDorada[0]=https://img.animeflv.cc/cover/;
     // $nombreDorama[1]=imagen-temporad-1;


       // hola mundo 2
       // hola -> h[1] 
       // mundo 2 -> h[0]
       // 2 -> a[0] 
       // mundo a[1]
       // boku-no-hero-academia
       // h[0]=boku
       // h[1]=no
       // h[2]=hero
       // h[3]=academia
       
       $nombreOriginal=explode("-",$nombreDorama[1]);

       $resul="";
       $num=count($nombreOriginal);
       for($i=0; $i<$num; $i++)
       $resul .= " ".$nombreOriginal[$i];
          
     // echo "\n" .$posible_url."\n";//portada
       // echo "</br>";
        // echo "\n" .$resul."\n";//nombre
       // echo "</br>";
       $guardaDes= description($nombreDorama[1]);//descripcion
       //echo "</br>";
    //   $guardaGenero=genero($nombreDorama[1]);//generos
     //  echo "</br>";
      $guardaBanner= bannerGood($nombreDorama[1]);//banner
      //echo tipo($nombreDorama[1]);
      /////////////////////////////////////
     
  $guardaGenero=genero($nombreDorama[1]);
  ////////////////////////////////////////
      //echo "insert into ('$posible_url','$resul','$o')";
      $serie="INSERT INTO  `principal` (`Nombre`, `Categoria`, `Portada`, `Banner`, `Descripcion` ) VALUES ('$resul','$guardaGenero','$posible_url','$guardaBanner','$guardaDes')";
      if(mysqli_query($conexion,$serie)){
echo "correcto";
      }else{

        echo "algo salio mal";
      }
    
  // prueba($posible_url);
  // videos($posible_url);
  //eliminar ducplicados select distinc(nombre) from principal

  }
}
  function tipo($Data){
    set_time_limit(20000000);

     $completar="https://www5.jkanime.video/".$Data;
     
    $url = file_get_contents($completar);
 
 

    $dom = new DOMDocument();
    @$dom->loadHTML($url);
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'text' );
 
//recorremos los divs
foreach( $divs as $div ){
    //si encentramos la clase mc-title nos quedamos con el titulo
    if( $div->getAttribute( 'div' ) === 'rounded bg-dark p-2 mt-2 altert alternativost' ){
        $title = $div->nodeValue;
    }
    //si encentramos la clase mr-rating nos quedamos con la puntuacion
   
  }
 
  //pintamos el resultado
 return $title;

    
  }
  function palabrasClave($Data){

    set_time_limit(20000000);

    $completar="https://www5.jkanime.video/".$Data;


  }
  function bannerGood($nombreAnime){
    set_time_limit(20000000);

    $completar="https://www.animefenix.com/".$nombreAnime;
    $conten=file_get_contents($completar);
    $resul="";
    //print ("<textarea>".$conten."</textarea");
    while(strpos($conten,"https://www.animefenix.com/cdn/animes/screenshot/"))
    {
    $posible_url=substr($conten,strpos($conten,"https://www.animefenix.com/cdn/animes/screenshot/"));
    $pos_final=strpos($posible_url,'"');
    $pos2_final=strpos($posible_url,"'");
    if($pos2_final>0 && $pos2_final< $pos_final){
    $pos_final=$pos2_final;
    }
    $posible_url=substr($posible_url,0,$pos_final);
   
    $conten=substr($conten,strpos($conten,"https://www.animefenix.com/cdn/animes/screenshot/")+0);  
    return $posible_url;
  }

  }
  // aun no acabado edu 
  // resuelvelo por favor
  function url($buscar, $link, $data){
    set_time_limit(20000000);
    $completar=$link;
    $conten=file_get_contents($completar);
    $resul="";
    while(strpos($conten,$buscar))
      {
      $posible_url=substr($conten,strpos($conten,$buscar));
      $pos_final=strpos($posible_url,'"');
      $pos2_final=strpos($posible_url,"'");
      if($pos2_final>0 && $pos2_final< $pos_final){
      $pos_final=$pos2_final;
      }
      $posible_url=substr($posible_url,0,$pos_final);
     
      $conten=substr($conten,strpos($conten,$buscar)+$data);  
      $nombreDorama=$porciones = explode($buscar, $posible_url);
      
         $num=count($nombreDorama);
       
         
     
      
    }
      $resul=myfor($nombreDorama,$num);
      return $resul;
  }
  function myfor($variable, $cantidad){
    for($i=0; $i<$cantidad; $i++)
    $resul .= " ".$variable[$i];
    return $resul;
  }
  function genero($categoria){
    set_time_limit(20000000);
$nombreDorama="";
    $completar="https://www5.jkanime.video/".$categoria;
    $conten=file_get_contents($completar);
    $resul="";
    $cuantos=0;
    //print ("<textarea>".$conten."</textarea");
    $contador = 0;
    while(strpos($conten,"https://www5.jkanime.video/genero/"))
    {
    $posible_url=substr($conten,strpos($conten,"https://www5.jkanime.video/genero/"));
    $pos_final=strpos($posible_url,'"');
    $pos2_final=strpos($posible_url,"'");
    if($pos2_final>0 && $pos2_final< $pos_final){
    $pos_final=$pos2_final;
    }
    $posible_url=substr($posible_url,0,$pos_final);
   
    $conten=substr($conten,strpos($conten,"https://www5.jkanime.video/genero/")+1);  
    $nombreDorama=$porciones = explode("https://www5.jkanime.video/genero/", $posible_url);
  
    $cuantos=count($nombreDorama);
    for($i=0; $i<$cuantos; $i++)
    $resul.=" ".$nombreDorama[$i];
    
  }
  return $resul;
     
 
       //$num=count($nombreDorama);
       ///for($i=0; $i<$num; $i++)
       //$resul .= " ".$nombreDorama[$i];
       //return $resul;
  }
  function description($url2){
    set_time_limit(20000000);

    //https://www5.jkanime.video/lupin-iii-part-6
    $url3="https://www5.jkanime.video/".$url2;
    $url = file_get_contents($url3);
    $dom = new DOMDocument();
    @$dom->loadHTML($url);
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'p' );

//recorremos los divs
foreach( $divs as $div ){
    //si encentramos la clase mc-title nos quedamos con el titulo
    if( $div->getAttribute( 'rel' ) === 'sinopsis' ){
        $title = $div->nodeValue;
    }
    //si encentramos la clase mr-rating nos quedamos con la puntuacion
   
  }
  //pintamos el resultado
 return $title;
  }
   function prueba($imagen){
    set_time_limit(20000000);

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
           
     
  /* function videos($imagen){
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
      //    $serie="insert into `capitulos` (`id_capitulo`,`video`, `id_nombre`, `ban`, `nombre`, `capitulo` ) VALUES ('0','','supergirl','$imagen','supergirl','$j');";
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

   //}
    //echo $i1;
   
   
//}
*/

?>
