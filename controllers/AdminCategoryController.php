<?php

/**
 * Контроллер AdminCategoryController
 * Управление категорями в админке
 */
class AdminCategoryController extends AdminBase
{
    /**
     * Главная страница управления категорями
     * @param $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверка прав доступа
        self::checkAdmin();

        // Получение списка категорий
        $categoriesList = array();
        $categoriesList = Category::getCategoriesListAdmin($page);

        // Получаем количество категорий
        $total = Category::getTotalCategoryAdmin();
        // Создаем новый объект класса
        $pagination = new Pagination($total, $page, Category::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once (ROOT . '/views/admin_category/index.php');
        return true;
    }

    /**
     * Страница добавления категории
     * @return bool
     */
    public function actionCreate()
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Обработчик формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // Делаем валидацию
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет, то сохраняем
                Category::createCategory($options);

                // Перенаправляем пользователя
                header('Location: /admin/category/');
            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_category/create.php');
        return true;
    }

    /**
     * Страница изменения категории
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Получаем информацию о категории
        $category = Category::getCategoryById($id);

        // Обработчик формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена, то считываем параметры
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            Category::updateCategoryById($id, $options);

            // Перенаправляем
            header('Location: /admin/category/');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_category/update.php');
        return true;
    }

    /**
     * Удаление выбранной категории
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Получаем полную информацию по удаляемой категории для вывода имени
        $categoryName = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            // Если форма была отправлена, то удаляем категорию
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя к списку категорий
            header('Location: /admin/category/');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_category/delete.php');
        return true;
    }
}