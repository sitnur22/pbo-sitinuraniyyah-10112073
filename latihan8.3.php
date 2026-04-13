<?php

echo "Silakan masukkan username: ";
$input_name = fopen("php://stdin","r");
$name = trim(fgets($input_name));

echo "Welcome, $name";

?>