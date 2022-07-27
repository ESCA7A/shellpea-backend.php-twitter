<?php

/**
 * Return a 400 bad request status code
 */
//http_response_code(400); exit;

/**
 * Return a 404 not found status code
 */
//http_response_code(404); exit;

/**
 * Return a 301 Redirect
 */
header("Location: localhost:8080/Homepage/Index.phtml", true, 301); exit();