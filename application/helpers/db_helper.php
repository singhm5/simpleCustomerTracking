<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('buildSearchQuery'))
{
    function buildSearchQuery($allowedfields)
    {
        $allowedSearchTerms = array('=', 'like', '>' , '<');

        $sql = '';
        $searchValue = array();
        foreach ($allowedfields as $field) {

            if(!empty($_GET[$field]))
            {
                if(isJson($_GET[$field]))
                {
                    $search = json_decode($_GET[$field], true);
                    foreach ($search as $key => $value)
                    {
                        $sql .= ' ' . $field . ' ' . (in_array($key, $allowedSearchTerms) ? $key : '=' ) . ' ?, ';
                        $searchValue [] = $value;
                    }
                }
                else
                {
                    $sql .= ' ' . $field . ' = ?, ';
                    $searchValue [] = $_GET[$field];
                }
            }
        }

        return array($searchValue, rtrim($sql, ","));
    }
}

if ( ! function_exists('isJson')) {

    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}