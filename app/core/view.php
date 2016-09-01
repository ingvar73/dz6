<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 15:53
 */

class View
{
    function generate($content, $template, $data = null){
        include 'app/views/'.$template;
    }
}