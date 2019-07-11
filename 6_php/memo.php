<?php 
echo "hello"
?>

<?php
$a =[1,2,3,4,5,5];
$a [6]=1;
print_r($a);



will remove the 3 trd item from the list .

<?php
$a =[1,3,5,7,9];
unset($a[2]);
print_r($a);


the count of function returs the number of members an array has

<?php
$a = [1,2,3,5,7,9];
echo count ($a);


this is for ounting the number of strings

<?php
$a =[1,2,3,5,7,9];
strlen($a);


to add one item in side array 

<?php
$a= [1,2,3];
array_push($a,4); //array is 1234
print_r($a);


to add one items which is '11' and delite one items which is "3 "in array .

<?php
$a= [3,9,11];
array_push($a,11); //array is 1234
unset($a[0]);
print_r($a);



if you want to hvave a key for the araay 

$a= ["a"=>"apple", "b"=>"banana","c"=>"orange"]
-------------
<?php
$a= ["alex"=> "18u9291","jessica"=> "1039"];

print_r($a);
echo "this is".$a["alex"]."\n";
echo "this is".$a["jessica"]."\n"; 



get john's name and display it with echo

<?php
$age =["step"=>18,"johe"=>20,"maria"=>15];


echo"he is".$age["johe"]."years old" ;







<?php
$a="alex";
$b="jessica";
$number =[$a =>"18738h",$b=>"jsjs"];

echo "this is".$number[$a]."\n";
echo "this is".$number[$b]."\n";




this is for displaying user's information with if statement.



<?php
$number =["alex"=> "71894911","jassica"=>"173917"];

if(array_key_exists("alex",$number
  )){
	echo "his number is ".$number["alex"]."\n";
}else{
	echo"alex nimber is not in the hone book";
}


if (array_key_exists("michael",$number)){
echo"michael phone number is".$number["michael"]."\n";
}else{
echo "michael number is not in the phone book";
}
