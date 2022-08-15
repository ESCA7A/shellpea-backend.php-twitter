<?php

require '../../Base.php';
require '../../Model/Base.php';
var_dump($_COOKIE);
$text = htmlspecialchars($_POST['text']);
print_r($text);
getCurrentCustomer('../../.env.php');
setPost($text, '../../.env.php');