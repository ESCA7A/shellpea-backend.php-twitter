<?php

#Controller/Registration/index.php

require '../../Base.php';
require '../../Model/Base.php';
echo STYLE;

if (!isset($_POST['reg_customer_name']) && !isset($_POST['reg_customer_nickname']) && !isset($_POST['reg_customer_password'])) {
    echo getRegistryForm();
}else {
    #1
    if ($_POST['reg_customer_name'] && $_POST['reg_customer_nickname'] && ['reg_customer_password']) {
        echo getRegistryForm();
        #2
        if (is_array(checkCustomerNickname($_POST['reg_customer_nickname'], '../../.env.php'))) {
            echo setWarning('Пользователь с таким никнеймом уже существует', 'bottom');
        } else {
            #3
            if (iconv_strlen($_POST['reg_customer_password']) > 6) {
                echo '3 прошло';
                $currentCustomerData = getCurrentCustomer('../../.env.php');
                $username = $_POST['reg_customer_name'];
                $nickname = $_POST['reg_customer_nickname'];
                $password = hash('sha256', $_POST['reg_customer_password']);
                createCustomer($username, $nickname, $password, '../../.env.php');

                session_start();
                $_SESSION['customer_name'] = $username;
                $_SESSION['customer_nickname'] = $nickname;
                $_SESSION['customer_id'] = $currentCustomerData['id'];
                setcookie('customer_name', $username, time() + 180);
                setcookie('customer_nickname', $nickname, time() + 180);
                setcookie('customer_id', $currentCustomerData['id'], time() + 180);

                echo setUrl('../../View/Homepage/');
            } else {
                echo "пароль должен содержать более 6 символов";
            }
        }
    }
}
