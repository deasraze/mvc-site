<?php

/**
 * Управление новостями
 * Контроллер NewsController
 */

class NewsController
{

    /**
     * Главная страница новостей
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Получаем id пользователя для аватара в шапке
        $idUser = User::getUserId();

        // Получаем массив новостей
        $newsList = array();
        $newsList = News::getNewsList($page);

        // Получаем общее количество новостей для пагинатора
        $total = News::getNewsCount();

        // Создаем новый объект класса
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        // Получаем массив новостей для слайдера
        $newsListForSlider = array();
        $newsListForSlider = News::getNewsListForSlider();

        // Подключаем вид
        require_once(ROOT . '/views/news/index.php');
        return true;
    }

    /**
     * Страница просмотра новости
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
        // Получаем id пользователя для аватара в шапке
        $idUser = User::getUserId();

        // Получаем информацию о новости
        $newsItem = News::getNewsItemById($id);

        // Подключаем вид
        require_once(ROOT . '/views/news/view.php');
        return true;
    }

}