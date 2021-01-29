<?php
$find = array('name', 'mayur', 'chavda');
$replace = array('n**e', 'm*y*r', 'c*a*d*');
if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
    $user_input = $_POST['user_input'];
    $user_input_new = str_replace($find, $replace, $user_input);
    echo $user_input_new;
}
?>
<hr>
<form action="" method="POST">
<textarea name="user_input" id="user_input" cols="30" rows="6"></textarea><br><br>
<input type="submit" value="submit">

</form>
