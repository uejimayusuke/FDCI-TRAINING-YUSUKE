<?php 

<?php

$array = array(
    'japan' => 'tokyo',
    'philippines' => 'manila',
    'china' => 'beijing',);

foreach ($array as $value) {
  echo "$value <br>";
}
echo end($array)."\n";

echo count($array);

array_push($array, "malaysia", "kuala lumpur");

print_r($array);
