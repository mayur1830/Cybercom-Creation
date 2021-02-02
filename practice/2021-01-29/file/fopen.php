<?php
//mode r-reading,w-writing,a-appending
$handle=fopen('abc.txt','w');
fwrite($handle,'hello mayur');
fclose($handle);
echo 'written';

?>