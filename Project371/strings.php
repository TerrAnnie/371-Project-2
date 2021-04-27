<!DOCTYPE html>
<html>
<body>

<?php
  $string_1=" first string ";
  $string_2=" second string ";
  $string_3=$string_1.$string_2; //$string_3=“ first string second string”
  $string_1.= $string_2 ; // $string_1 = $string_1 . $string_2 
  
  $char=$string_1[3]; //return the third character of string_1
  
  echo $string_3;
  
  echo $char;
  
  
  $count=32;
  
  $info='Not possible to type a $count variable'; // with single quotations you can’t include variables 

  $text="There are $count students in the class"; // with double quotations you can include variables
  
  $text_1='My sister\'s car is a Volkswagen'; //escape the ' character

  $text_2 = "My mother always said \"Exercise\"."; //escape the " character
      
$substring=substr($text_2,3,6); // returns substring of $text_2 that starts at index 3, and the length is 6 characters (mother).
echo $substring;
?>

</body>
</html>
