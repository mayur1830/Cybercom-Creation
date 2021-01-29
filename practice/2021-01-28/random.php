<?php
if (isset($_POST['Click'])) {
    $rand = rand(1, 6);
    echo 'your score is', $rand;
}

?>
<form  method="POST">
<input type="submit" name="Click" value="Click">
</form>
