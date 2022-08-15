<?php

#Controller/index.php
require '../Base.php';
require '../Model/Base.php';

echo STYLE;
echo 'var dump: '. var_dump($_SESSION);
#if cookie null

if (empty($_COOKIE['customer_name']) && empty($_COOKIE['customer_nickname'])) {
    #check post data
    if(empty((htmlspecialchars($_POST['auth_customer_name'])))
        && empty((htmlspecialchars($_POST['auth_customer_nickname'])))
        && empty((htmlspecialchars($_POST['auth_customer_password'])))) {
        #auth form if no data
        echo getAuthForm();
    }else {
        #assign post data
        $customerName = htmlspecialchars($_POST['auth_customer_name']);
        $customerNickname = htmlspecialchars($_POST['auth_customer_nickname']);
        $passHash = hash('sha256', $_POST['auth_customer_password']);

        #checking customer in db
        $currentCustomer = getCustomerDB('../.env.php');
        if (!$currentCustomer) {
            echo getAuthForm();
            echo setWarning('Incorrect data');
            exit('Incorrect data');
        }else {
            #check field lenght
            if (iconv_strlen($customerName) > 2 && iconv_strlen($customerNickname) > 2) {
                #set cookie
                setcookie('customer_id', $currentCustomer['id'], time()+360);
                setcookie('customer_name', $currentCustomer['username'], time()+360);
                setcookie('customer_nickname', $currentCustomer['nickname'], time()+360);
                echo setUrl('Controller/');
            } else exit('поля должны быть не менее чем из 2 символов');
        }
    }
}else {
    #if cookie fill
    echo "Holla bolla," . $_COOKIE['customer_name'] . "\t@" . $_COOKIE['customer_nickname'];
    $posts = getPosts('../.env.php');
    getTweetFieldHTML('createTweet/');
    endSessionBtn('ExitButton/');
    foreach ($posts as $val => $item) {
        echo "<pre>";
        echo $item;
        echo "</pre>";
    }
}
