<?php

namespace CiscoDelgado\CommonUtilities\StringProcessing;

/**
 * @param string $name
 * @return string
 */
function slugify($name)
{
    $slugifiedName = preg_replace('~[^\pL\d]+~u', '-', $name);
    $slugifiedName = iconv('utf-8', 'us-ascii//TRANSLIT', $slugifiedName);
    $slugifiedName = preg_replace('~[^-\w]+~', '', $slugifiedName);
    $slugifiedName = trim($slugifiedName, '-');
    $slugifiedName = preg_replace('~-+~', '-', $slugifiedName);

    return strtolower($slugifiedName);
}

/**
 * @param string $word
 * @return string
 */
function snake_to_camel($word)
{
    return lcfirst(str_replace('_', '', ucwords($word, '_')));
}

/**
 * @param string $word
 * @return string
 */
function camel_to_snake($word)
{
    return strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', '_$1', $word));
}

/**
 * @param $text
 * @return string
 */
function strip_white_space($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}

/**
 * @param string $text
 * @param int $max
 * @param string $symbol
 * @return string
 */
function truncate($text, $max, $symbol = '...')
{
    $temp = substr($text, 0, $max);
    $last = strrpos($temp, ' ');
    $temp = substr($temp, 0, $last);
    $temp = preg_replace('/([^\w])$/', '', $temp);

    return $temp.$symbol;
}