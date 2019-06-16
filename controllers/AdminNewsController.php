<?php

/**
 * Контроллер для управления новостями в админке
 * Class AdminNewsController
 */

class AdminNewsController extends AdminBase
{

    /**
     * Главная страница с новостями
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {

            // Получаем массив с новостями
            $newsList = array();
            $newsList = News::getNewsListForAdminPanel($page);

            // Получаем общее количество новостей
            $total = News::getNewsCountForAdminPanel();

            // Создает новый объект класса
            $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');

            // Подключаем вид
            require_once (ROOT . '/views/admin_news/index.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница добавления новой новости
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Очищаем поля
            $options['title'] = '';
            $options['short_content'] = '';
            $options['content'] = '';

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, то считываем данные
                $options['title'] = $_POST['title'];
                $options['short_content'] = $_POST['short_content'];
                $options['content'] = $_POST['content'];
                $options['status'] = $_POST['status'];

                // Делаем валидацию
                $errors = false;
                if (!isset($options['title']) || empty($options['title']) ||
                    !isset($options['short_content']) || empty($options['short_content']) ||
                    !isset($options['content']) || empty($options['content'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то добавляем и получаем id добавленной новости
                    $id = News::createNews($options);

                    if ($id) {
                        // Если запись успешно добавлено, проверяем, было ли загружено изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если изображение было загружено, то перемещаем его
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                        }
                    };

                    // Перенаправляем
                    header("Location: /admin/news/");
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_news/create.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница редактирования новости
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем информацию о новости
            $news = News::getNewsItemById($id);

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, то считываем данные
                $options['title'] = $_POST['title'];
                $options['short_content'] = $_POST['short_content'];
                $options['content'] = $_POST['content'];
                $options['status'] = $_POST['status'];

                // Делаем валидацию
                $errors = false;
                if (!isset($options['title']) || empty($options['title']) ||
                    !isset($options['short_content']) || empty($options['short_content']) ||
                    !isset($options['content']) || empty($options['content'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то сохраняем
                    if (News::updateNews($id, $options)) {
                        // Если запись успешно обновлена, то проверяем, загружалось ли изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если изображение было загружено, перемещаем его
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                        }
                    }

                    // Перенаправляем
                    header("Location: /admin/news");
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_news/update.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Удаление новости
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Удаляем выбранную новость
            News::deleteNews($id);

            return true;
        }

        die('Доступ запрещен');
    }
}