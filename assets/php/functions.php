<?php
function rand_auth($min, $max)
  {
  $range = $max - $min;
  if ($range < 1) return $min; // not so random...
  $log = ceil(log($range, 2));
  $bytes = (int) ($log / 8) + 1; // length in bytes
  $bits = (int) $log + 1; // length in bits
  $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
  do {
  $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
  $rnd = $rnd & $filter; // discard irrelevant bits
  } while ($rnd > $range);
  return $min + $rnd;
  }
  
  function getToken($length)
  {
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited
  
  for ($i=0; $i < $length; $i++) {
  $token .= $codeAlphabet[rand_auth(0, $max-1)];
  }
  
  return $token;
  }
  
  //count to k m b
  function fcount($num) {
  
  if($num>1000) {
  
  $x = round($num);
  $x_number_format = number_format($x);
  $x_array = explode(',', $x_number_format);
  $x_parts = array('k', 'm', 'b', 't');
  $x_count_parts = count($x_array) - 1;
  $x_display = $x;
  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
  $x_display .= $x_parts[$x_count_parts - 1];
  
  return $x_display;
  
  }
  
  return $num;
  }
  
  
    ?>