<?php
$inp	= file_get_contents("php://input");
file_put_contents("file/callback_".time().".txt",print_r($_POST,true)." -- ".print_r($_REQUEST,true)." -- ".$inp);
?>