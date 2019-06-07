<?php

/**
 * Контроллер AdminController
 */
class AdminController extends AdminBase
{

    /**
     * Action для главной страницы админ панели
     * @return bool
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Подключаем вид
        require_once (ROOT . '/views/admin/index.php');
        return true;
    }

    /**
     * Страница поиска в админ панели
     * @return bool
     */
    public function actionSearch()
    {
        if (isset($_POST['query'])) {
            // Если запрос был отправлен, считываем с какой страницы был запрос и определяем метод для поиска
            $url = $_SERVER['HTTP_REFERER'];

            if (strpos($url, 'collection') !== false) {
                $query = '%' . $_POST['query'] . '%';
                Collection::searchCollectionInAdminPanel($query);

            } elseif (strpos($url, 'user') !== false) {
                $query = '%' . $_POST['query'] . '%';
                User::searchUserInAdminPanel($query);

            } elseif (strpos($url, 'order') !== false) {
                $query = '%' . $_POST['query'] . '%';
                Order::searchOrderInAdminPanel($query);

            } elseif (strpos($url, 'ticket') !== false) {
                $query = '%' . $_POST['query'] . '%';
                Tickets::searchTicketInAdminPanel($query);

            } elseif (strpos($url, 'category') !== false) {
                $query = '%' . $_POST['query'] . '%';
                Category::searchCategoryInAdminPanel($query);
            }
        }

        return true;
    }
}