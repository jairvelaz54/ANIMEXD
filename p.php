<?php
include ("simple_html_dom.php");
$html=file_get_html("https://www5.jkanime.video/");
foreach($html->find(".odd")as $a){
    echo "</br>". $a->plaintext."</br>";
}

?>