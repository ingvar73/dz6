<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 29.08.2016
 * Time: 2:31
 */
class News
{
    /** Return single news item by Id
     * @param $id
     */
    public static function getNewsItemById($id){
        // Запрос к базе
        $id = intval($id);
        if($id){
//            $host = 'localhost';
//            $dbname = 'mvc_site';
//            $user = 'root';
//            $password = '';
//            $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id='.$id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
//            $result->setFetchMode(PDO::FETCH_NUM);
            $newsItem = $result->fetch();
            return $newsItem;
        }
    }

    /** Return an array of news items
     */
    public static function getNewsList()
    {
        // Запрос к базе
//        $host = 'localhost';
//        $dbname = 'mvc_site';
//        $user = 'root';
//        $password = '';
//        $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        $db = Db::getConnection();

        $newsList = array();
        $result = $db->query('SELECT id, title, date, short_content'
            .'FROM news'.'ORDER by date DESC '
            .'LIMIT 10');
        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }
}