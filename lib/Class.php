<?php
require_once("config.php");

class CodeClass{

 public function getPicture(){
  $db = getDB();
  $data = "";
  $getpic = $db->prepare("SELECT * FROM carousel");
  $getpic->execute();
  foreach($getpic as $key){
	  $data .= $key["picPath"]."<br>";
  }
  return $data;
 }

}
?>