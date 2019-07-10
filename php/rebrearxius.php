<?php
$file = $_FILES["foto"]["tmp_name"];
$filename = $_FILES["foto"]["name"];

if(!file_exists("uploads/")){
  mkdir("uploads/","0777");
}
if(file_exists("uploads/".basename($filename))){
  echo "Ja existeix";
}else{
  if (move_uploaded_file($file, "uploads/".basename($filename))){
    echo "Imatge pujada correctament";
  }else{echo "Error!";}
}


?>