<?php

/**
 * Контроллер для управления коллекциями в админке
 * AdminCollectionController
 */

class AdminCollectionController extends AdminBase
{

    /**
     * Страница управления коллекциями
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверка доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Получаем список коллекций
            $collectionList = array();
            $collectionList = Collection::getCollectionListAdmin($page);

            // $total - ко-во коллекций
            $total = Collection::getTotalCollectionAdmin();

            // Создаем объект Pagination - постраничная навигация
            // page- ключ который будет в url
            $pagination = new Pagination($total, $page, Collection::SHOW_BY_DEFAULT, 'page-');

            // Подключаем вид
            require_once (ROOT . '/views/admin_collection/index.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница добавления нового произведения
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Получение списка категорий
            $categoriesList = Category::getCategoriesListAdminByCollection();

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена, считываем данные
                $options['name'] = $_POST['name'];
                $options['author'] = $_POST['author'];
                $options['year'] = $_POST['year'];
                $options['material'] = $_POST['material'];
                $options['size'] = $_POST['size'];
                $options['category_id'] = $_POST['category_id'];
                $options['description'] = $_POST['description'];
                $options['status'] = $_POST['status'];
                $options['display_block'] = $_POST['display_block'];

                $errors = false;

                // Делаем валидацию
                if (!isset($options['name']) || empty($options['name'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то добавляем новое произведение
                    $id = Collection::createCollection($options);

                    if ($id) {
                        // Если запись успешно добавлена, то проверяем было ли загружено изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если загружалось, переместим его в нужную папку и дадим новое имя
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/collections/{$id}.jpg");
                        }
                    };

                    // Перенаправляем в раздел с коллекциями
                    header('Location: /admin/collection/');
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_collection/create.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница изменения произведения
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Получаем список категорий
            $categoriesList = Category::getCategoriesListAdminByCollection();

            // Получаем данные о конкретном произведении
            $collection = Collection::getCollectionById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена, считываем данные
                $options['name'] = $_POST['name'];
                $options['author'] = $_POST['author'];
                $options['year'] = $_POST['year'];
                $options['material'] = $_POST['material'];
                $options['size'] = $_POST['size'];
                $options['category_id'] = $_POST['category_id'];
                $options['description'] = $_POST['description'];
                $options['status'] = $_POST['status'];
                $options['display_block'] = $_POST['display_block'];

                $errors = false;

                // Делаем валидацию
                if (!isset($options['name']) || empty($options['name'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    // Сохраняем изменения
                    if (Collection::updateCollectionById($id, $options)) {
                        // Если запись успешно сохранена, то проверяем было ли загружено изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если загружалось, переместим его в нужную папку и дадим новое имя
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/collections/{$id}.jpg");
                        }
                    }

                    // Перенаправляем пользователя на страницу управления коллекциями
                    header('Location: /admin/collection/');
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_collection/update.php');
            return true;
        }

        die('Доступ запрещен');
    }


    /**
     * Страница удаления произведения
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        if (self::checkAdmin() || self::checkEditor()) {

            // Удаляем
            Collection::deleteCollectionById($id);
            return true;
        }

        die('Доступ запрещен');
    }
}