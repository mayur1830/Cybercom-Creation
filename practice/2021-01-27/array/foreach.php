<?php
//foreach loop
$data = array('name' => array('mayur', 'gaurang', 'kevin'), 'roll_no' => array(1, 2, 3));
echo "<pre>";
print_r($data);
echo "</pre>";
foreach ($data as $value) {

    foreach ($value as $inner) {
        echo $inner . '<br>';
    }
}
