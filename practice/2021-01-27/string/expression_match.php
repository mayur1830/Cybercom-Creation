<?php
function has_space($string)
{
    if (preg_match('/ / ', $string)) {
        return true;
    } else {
        return false;
    }
}
$string = "hddddidjjsbhbsbsbsb";
if (has_space($string)) {
    echo 'String has Space';
} else {
    echo 'String has no Space';
}
