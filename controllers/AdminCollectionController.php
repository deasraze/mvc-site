<?php

/**
 * Контроллер для управления коллекциями в админке
 * AdminCollectionController
 */
class AdminCollectionController extends AdminBase
{

    /**
     * Страница управления коллекциями
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список коллекций
        $collectionList = Collection::getCollectionList();

        // Подключаем вид
        require_once (ROOT . '/views/admin_collection/index.php');
        return true;
    }

    /**
     * Страница добавления нового произведения
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получение списка категорий
        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена, считываем данные
            $options['name'] = $_POST['name'];
            $options['author'] = $_POST['author'];
            $options['year'] = $_POST['year'];
            $options['category_id'] = $_POST['category_id'];
            $options['description'] = $_POST['description'];
            $options['status'] = $_POST['status'];

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
                    //echo '<pre>'; print_r($_FILES["image"]); die;
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папку и дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/collections/{$id}.jpg");
                    }
                };

                // Перенаправляем в раздел с коллекциями
                header('Location: /admin/collection/');
            }
        }

        require_once (ROOT . '/views/admin_collection/create.php');
        return true;
    }

    /**
     * Страница изменения произведения
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном произведении
        $collection = Collection::getCollectionById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена, считываем данные
            $options['name'] = $_POST['name'];
            $options['author'] = $_POST['author'];
            $options['year'] = $_POST['year'];
            $options['category_id'] = $_POST['category_id'];
            $options['description'] = $_POST['description'];
            $options['status'] = $_POST['status'];

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

        // Подключаем вид
        require_once (ROOT . '/views/admin_collection/update.php');
        return true;
    }


    /**
     * Страница удаления произведения
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем полную инф-ю по удаляемому произведению
        $collection = Collection::getCollectionById($id);
        $collectionName = $collection['name'];

        if (isset($_POST['submit'])) {
            // Если форма отправлена, то удаляем выбранное произведение
            Collection::deleteCollectionById($id);

            // Перенаправляем пользователя на страницу с коллекциями
            header('Location: /admin/collection/');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_collection/delete.php');
        return true;
    }
}