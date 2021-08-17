<?php
//Vitória Dias Brito
  function saudacao(){
    $hora = date("H");
if(($hora<12) and ($hora>=6)){
  print "Bom dia";
}
elseif(($hora<18) and ($hora>=12)){
  print "Boa tarde";
}
elseif(($hora<24) and ($hora>=18)){
  print "Boa noite";
}
elseif(($hora<6) and ($hora>=24)){
  print "Boa madrugada";
}
  }
 ?>
