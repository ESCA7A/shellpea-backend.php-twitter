<?php

#View/Homepage/Index.php

require "../../Base.php";
require "../../Model/Base.php";

//if (!empty($_COOKIE['customer_name']) && !empty($_COOKIE['customer_nickname']) && !empty($_COOKIE['customer_id'])){
//    echo setUrl('../../Controller/');
//}else {
//    //echo getAuthForm();
//}
echo setUrl('../../Controller/');
