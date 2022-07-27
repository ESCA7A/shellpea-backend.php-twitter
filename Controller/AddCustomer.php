<?php

/**
 *
 */
$path = __DIR__ . '/Model/db.php';
//require_once $path;
$customerName = $_POST['customer_name'];
$customerNickname = $_POST['customer_nickname'];
$customerPassword = $_POST['customer_password'];

/**
 * try to log in customer
 */
//if (!setUser($customerName, $customerNickname)){
//    print("разработчикам лень думать где вы ошиблись, так что подумайте сами\n");
//    print("введите корректные данные\n");
//};


header("Location: http://localhost:8080/View/secondPage/Index.phtml", true, 301);
