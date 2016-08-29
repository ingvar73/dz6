<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 29.08.2016
 * Time: 1:52
 */
include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        echo "<pre>";
        print_r($newsList);
        echo "</pre>";
        return true;
    }

    public function actionView($id)
    {
        if($id){
            $newsItem = News::getNewsItemById($id);

            echo "<pre>";
            print_r($newsItem);
            echo "</pre>";

            echo "actionView";
        }
        return true;
    }
}