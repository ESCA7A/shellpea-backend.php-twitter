<?php
/**
 * connect to server
 */

#Model

/**
 * @param $customerName
 * @param $customerNickname
 * @param $passHash
 * @param $env
 * @return bool|mysqli_result
 */
function createCustomer($customerName, $customerNickname, $passHash, $env = '../.env.php'){
    require $env;
    $query = "INSERT INTO customers (username, nickname, pass_hash) VALUES ('$customerName', '$customerNickname', '$passHash');";
    /**
     * @var $conn
     */
    return mysqli_query($conn, $query);
}

/**
 * @param $customerName
 * @param $customerNickname
 * @param $passHash
 * @return array|false|null
 */
function getCustomerDB($env = '../.env.php'){
    $customerName = htmlspecialchars($_POST['auth_customer_name']);
    $customerNickname = htmlspecialchars($_POST['auth_customer_nickname']);
    $passHash = hash('sha256', $_POST['auth_customer_password']);
    require $env;
    $select = "SELECT * FROM customers 
                 WHERE username = '$customerName' 
                 AND nickname = '$customerNickname'
                 AND pass_hash = '$passHash';";
    /**
     * @var $conn
     */
    $select = mysqli_query($conn, $select);
    return mysqli_fetch_assoc($select);
}

function checkCustomerNickname($customerNickname, $env = '../.env.php'){
    require $env;
    $select = "SELECT username, nickname, pass_hash FROM customers WHERE nickname = '$customerNickname';";
    /**
     * @var $conn
     */
    $select = mysqli_query($conn, $select);
    return mysqli_fetch_assoc($select);
}

/**
 * @param string $env
 * @return array|false|null
 */
function getCurrentCustomer(string $env = '../.env.php'){
    require $env;
    $nickname = $_SESSION['customer_nickname'];
    $select = "SELECT * FROM customers WHERE nickname = '$nickname'";
    /**
     * @var $conn
     */
    $select = mysqli_query($conn, $select);
    $assoc = mysqli_fetch_assoc($select);
    return $assoc[$nickname];
}

function getCustomerIdbySession($env = '../.env.php'){
    require $env;
    $nickname = $_SESSION['customer_nickname'];
    $query = "SELECT id FROM customers WHERE nickname = $nickname";
    /**
     * @var $conn
     */
    $query = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($query);
}

/**
 * @param $text
 * @param string $env
 * @return array|false|null
 */
function setPost($text, string $env = '../.env.php'){
    require $env;
    $customerId = $_COOKIE['customer_id'];
    $query = "INSERT INTO tweets(text, customer_id) VALUES ('$text', '$customerId')";
    /**
     * @var $conn
     */
    $query = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($query);
}

/**
 * @param string $env
 * @return array|false|null
 */
function getCustomerPosts(string $env = '../.env.php'){
    require $env;
    $customerId = $_COOKIE['customer_id'];
    $query = "SELECT posts.post FROM customers AS users JOIN posts on users.id = '$customerId'";
    /**
     * @var $conn
     */
    $query = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($query);
}

/**
 * @param string $env
 * @return array|false|null
 */
function getPosts(string $env = '../.env.php'){
    require $env;
    $query = "SELECT * FROM tweets";
    /**
     * @var $conn
     */
    $query = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($query);
}
