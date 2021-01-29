<?php
date_default_timezone_set("Asia/Calcutta");
$time = time();
$actual = date('D M Y @ H:i:sa', $time);
echo $actual;
//strtotime('1week')-->english textual datetime into unix timestamp
//strtotime(time)
