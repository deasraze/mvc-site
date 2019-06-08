<?php

include_once ROOT . '/models/News.php';

class NewsController
{

    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        // Получаем id пользователя для аватара в шапке
        $idUser = User::getUserId();

        require_once(ROOT . '/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            // Получаем id пользователя для аватара в шапке
            $idUser = User::checkLogged();

            $newsItem = News::getNewsItemById($id);

            require_once(ROOT . '/views/news/view.php');
        }

        return true;
    }

}