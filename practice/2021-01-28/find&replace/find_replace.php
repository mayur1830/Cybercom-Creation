<?php
$offset = 0;
if (isset($_POST['user_input']) && isset($_POST['searchfor']) && isset($_POST['replacewith'])) {
    $user_input = $_POST['user_input'];
    $search = $_POST['searchfor'];
    $replace = $_POST['replacewith'];
    $length = strlen($search);
    if (!empty($user_input) && !empty($search) && !empty($replace)) {
        while ($strpos = strpos($user_input, $search, $offset)) {
            $offset = $strpos + $length;
            $user_input = substr_replace($user_input, $replace, $strpos, $length);
        }
        echo $user_input;
    } else {
        echo 'please enter all data';
    }

}
?>
<hr>
<form action="" method="POST">
<textarea name="user_input" id="text" cols="30" rows="6"></textarea>
<br>
<br>
Search For : <br>
<input type="text" name="searchfor"> <br><br>
Replace With : <br>
<input type="text" name="replacewith"><br><br>
<input type="submit" value="submit">
</form>
