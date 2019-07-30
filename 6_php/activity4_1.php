<?php

$array = array ('Mary'=> 15,'George'=>25,'Mike'=>30,);
print_r ($array); 

$array2 =(array_keys($array));
foreach($array2 as $value){
$value = $value;
echo"<br>";
echo $value." is ".$array[$value]."years old"."<br>";

}