<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 15:54
 */

class Controller
{
    public $model;
    public $view;

    function __construct(){
        $this->view = new View();
    }

    function action_index(){

    }
}