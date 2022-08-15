<?php

require 'bootstrap.php';
require 'Base.php';

#Index.php

echo STYLE;

echo setHeader('Это чертов твиттер</br>Ох намучался же я!');

if (!empty($_COOKIE['customer_name']) && !empty($_COOKIE['customer_nickname'])){
    echo setUrl('View/Homepage/', 3);
}
else {
    echo setUrl('Controller/', 3);
}




