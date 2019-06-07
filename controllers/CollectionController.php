<?php

/**
 * Контроллер CollectionController
 * Управление коллекциями
 */

class CollectionController
{

    /**
     * Страница с коллекциями
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Получаем список категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        // Получаем список последних произведений
        $latestCollection = array();
        $latestCollection = Collection::getLatestCollection($page);

        // $total - ко-во коллекций
        $total = Collection::getTotalCollection();

        // Создаем объект Pagination - постраничная навигация
        // page- ключ который будет в url
        $pagination = new Pagination($total, $page, Collection::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/collection/index.php');

        return true;
    }

    /**
     * Страница просмотра коллекций в категории
     * @param $categoryId
     * @param int $page
     * @return bool
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // Получаем список категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        // Получаем список коллекций
        $categoryCollection = array();
        $categoryCollection = Collection::getCollectionListByCategory($categoryId, $page);

        // $total - ко-во товаров в текующей категории
        $total = Collection::getTotalCollectionInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        // page- ключ который будет в url
        $pagination = new Pagination($total, $page, Collection::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/collection/category.php');

        return true;
    }

    /**
     * Страница просмотра произведения
     * @param $collectionId
     * @return bool
     */
    public function actionView($collectionId)
    {
        // Получаем список категорий
        $categories = array();
        $categories = Category::getCategoriesList();

        $collection = Collection::getCollectionById($collectionId);
        if ($collection != null) {
            require_once (ROOT. '/views/collection/view.php');
        } else {
            echo '404';
        }

        return true;
    }
}