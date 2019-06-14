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
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Получение списка категорий
            $categoriesList = array();
            $categoriesList = Category::getCategoriesListAdmin($page);

            // Получаем количество категорий
            $total = Category::getTotalCategoryAdmin();
            // Создаем новый объект класса
            $pagination = new Pagination($total, $page, Category::SHOW_BY_DEFAULT, 'page-');

            // Подключаем вид
            require_once(ROOT . '/views/admin_category/index.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница добавления категории
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Очищаем данные
            $options['name'] = '';
            $options['sort_order'] = '';
            // Обработчик формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                $options['name'] = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['status'] = $_POST['status'];

                $errors = false;

                // Делаем валидацию
                if (!isset($options['name']) || empty($options['name']) ||
                    !isset($options['sort_order']) || empty($options['sort_order'])) {
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
            require_once(ROOT . '/views/admin_category/create.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница изменения категории
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

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
            require_once(ROOT . '/views/admin_category/update.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Удаление выбранной категории
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Удаляем
            Category::deleteCategoryById($id);
            return true;
        }

        die('Доступ запрещен');
    }
}