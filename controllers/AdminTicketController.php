<?php

/**
 * Контроллер AdminTicketController
 * Управление билетами в админке
 */

class AdminTicketController extends AdminBase
{
    /**
     * Страница с билетами
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверка прав доступа
        self::checkAdmin();

        // Получаем список билетов
        $ticketList = Tickets::getTicketListAdmin($page);

        // Считаем количество билетов
        $total = Tickets::getTotalTicketsAdmin();
        // Создаем новый объект класса
        $pagination = new Pagination($total, $page, Tickets::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/admin_ticket/index.php');
        return true;

    }

    /**
     * Страница добавления нового билета
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка прав доступа
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            // Если форма отправлена, то считываем параметры
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['description'] = $_POST['description'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

            // Делаем валидацию
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните название';
            }

            if ($errors == false) {
                // Если ошибок нет, то добавляем новый билет и получаем его id
                $id = Tickets::createTicket($options);

                if ($id) {
                    // Если запись успешно добавлена, то проверяем, было ли загружено изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если изображение было загружено, перемещаем его в папку и даем новое название
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/tickets/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя
                header('Location: /admin/ticket/');
            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_ticket/create.php');
        return true;
    }

    /**
     * Страница обновления билета
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка прав доступа
        self::checkAdmin();

        // Получаем информацию о билете
        $ticket = Tickets::getTicketById($id);

        if (isset($_POST['submit'])) {
            // Если форма была отправлена, то считываем данные
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['description'] = $_POST['description'];
            $options['availability'] = $_POST['availability'];
            $options['status'] = $_POST['status'];

            // Делаем валидацию
            $errors = false;
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет, то обновляем запись
                if (Tickets::updateTicketById($id, $options)) {
                    // Если запись успешно обнавлена, то проверяем, было ли загружено изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если изображение было загружено, то перемещаем его и даем новое название
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/tickets/{$id}.jpg");
                    }
                }
                // Перенаправляем пользователя
                header('Location: /admin/ticket/');
            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_ticket/update.php');
        return true;
    }

    /**
     * Страница удаления билета
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка прав доступа
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            // Если кнопка была нажата, то удаляем выбранный билет
            Tickets::deleteTicketById($id);

            // Перенаправляем
            header('Location: /admin/ticket/');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_ticket/delete.php');
        return true;
    }
}