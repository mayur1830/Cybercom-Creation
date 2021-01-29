<?php ob_start();?>
<h1>My Page</h1>
<p>This is my page</p>

<?php
//$redirect_page = 'http://google.co.uk';
header('Location:http://google.co.uk');
ob_end_clean();
?>

