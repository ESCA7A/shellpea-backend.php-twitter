<?php

$var = file_get_contents('html.txt');

function replace_quotes($text)
{
    $text = htmlspecialchars_decode($text, ENT_QUOTES);
    $text = str_replace(array('\'', '\''), '"', $text);
    return preg_replace_callback('/(([\"]{2,})|(?![^\W])(\"))|([^\s][\"]+(?![\w]))/u', 'replace_quotes_callback', $text);
}

function replace_quotes_callback($matches)
{
    if (count($matches) == 3) {
        return '\'';
    } elseif (!empty($matches[1])) {
        return str_replace('"', '\'', $matches[1]);
    } else {
        return str_replace('"', '\'', $matches[4]);
    }
}

$text = replace_quotes($var);

//записываем текст в файл
file_put_contents('response.txt', $text);

