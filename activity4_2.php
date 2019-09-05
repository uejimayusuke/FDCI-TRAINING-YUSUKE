<?php

$b = 2;
echo "Number is $b";
echo"<br>";
if ($b < 15){
  $a = $b*2;
  echo "The new number is $a";
} else if ($b >= 15 && $b <= 20){
  $a = $b + 10;
  echo "The new number is $a";
} else {
  $a = $b / 2;
  echo "The new number is $a";
}
?>