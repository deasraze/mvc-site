<?php


class CollectionController
{

    public function actionIndex($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

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

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

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

    public function actionView($collectionId)
    {
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