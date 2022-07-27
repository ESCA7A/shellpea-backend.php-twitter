<?php
/**
 * create database and tables
 */

/**
 * merge file shellpea/View/index.php
 */
//require_once ('/home/esca7a/Desktop/shellpea/Model/env.php');
//require_once('/home/esca7a/Desktop/shellpea/View/Index.phtml');
//require_once('/home/esca7a/Desktop/shellpea/Controller/AddCustomer.php');

$CREATE_DB = "CREATE DATABASE twitter;

    CREATE TABLE customers(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(64) NOT NULL,
    customer_nickname VARCHAR(32) NOT NULL UNIQUE,
    created_at DATETIME
    );
    
    CREATE TABLE pass(
    customer_id INT(11) NOT NULL,
    customer_password VARCHAR()
    
    );
    
    CREATE TABLE tweets(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_id INT(11),
    content VARCHAR(2048) NOT NULL,
    created_at DATETIME,
    FOREIGN KEY (customer_id) REFERENCES customers(id)
    );
    
    CREATE TABLE hashtags(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(32) NOT NULL UNIQUE,
    created_at DATETIME
    );
    
    CREATE TABLE customer_hashtag(
    customer_id INT(11) NOT NULL,
    hashtag_id INT(11) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (hashtag_id) REFERENCES hashtags(id)
    );
";

/**
 * SQL request add new user
 * @var $customerName
 * @var $customerNickname
 * @var $created_at
 */
function setUser($customerName, $customerNickname){
    $created_at = date('d-m-y h:i:s');
    $ADD_USER_SQL = "INSERT INTO customers(customer_name, customer_nickname, created_at)
            VALUES ('$customer_name', '$customerNickname', '$created_at')";
//    mysqli_query($SQL_CONNECT, $ADD_USER_SQL);
}
$ADD_USER_SQL = "INSERT INTO customers(customer_name, customer_nickname, created_at)
            VALUES ('$customerName', '$customerNickname', '$created_at')";