<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 16:21
 */

class Controller_404 extends Controller {

    public function action_index()
    {
        $this->view->generate('404_view.twig', array(
            "title" => "404 - Ошибка"
        ));
    }