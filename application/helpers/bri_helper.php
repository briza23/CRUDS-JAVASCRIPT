<?php
/**
 * This is where we put our customized functions
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('avb_print_r'))
{
    function jab_print_r($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
?>