<?php

/**
 * AdminOrderController управление заказами
 */
class AdminOrderController extends AdminBase
{

    /**
     * Страница с заказами
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем список заказов
            $ordersList = array();
            $ordersList = Order::getOrdersListByAdmin($page);

            // Получаем общее число заказов
            $total = Order::getTotalOrderAdmin();
            // Создаем новый объекс класса
            $pagination = new Pagination($total, $page, Order::SHOW_BY_DEFAULT, 'page-');

            // Подключаем вид
            require_once (ROOT . '/views/admin_order/index.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница с просмотром заказа
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем данные о конкретном заказе
            $order = Order::getOrderById($id);

            // Получаемый информацию о пользователе (если был зарегистрирован)
            $user = User::getUserById($order['user_id']);

            // Получаем массив с идентификаторами и количеством билетов
            $ticketsQuantity = json_decode($order['tickets'], true);

            // Получаем массив только с id билетов
            $ticketsIds = array_keys($ticketsQuantity);

            // Получаем список билетов в заказе
            $tickets = Tickets::getTicketsByIds($ticketsIds);

            // Подключаем вид
            require_once (ROOT . '/views/admin_order/view.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница обновления заказа
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем информацию о заказе
            $order = Order::getOrderById($id);

            // Проверяем отправку формы
            if (isset($_POST['submit'])) {
                // Если форма была отправлена, считываем данные
                $options['user_name'] = $_POST['user_name'];
                $options['user_surname'] = $_POST['user_surname'];
                $options['user_patronymic'] = $_POST['user_patronymic'];
                $options['user_phone'] = $_POST['user_phone'];
                $options['user_comment'] = $_POST['user_comment'];
                $options['date'] = $_POST['date'];
                $options['status'] = $_POST['status'];

                // Валидация
                $errors = false;

                if (!isset($options['user_name']) || empty($options['user_name']) ||
                    !isset($options['user_surname']) || empty($options['user_surname']) ||
                    !isset($options['user_patronymic']) || empty($options['user_patronymic']) ||
                    !isset($options['user_phone']) || empty($options['user_phone']) ||
                    !isset($options['date']) || empty($options['date'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет, то обновляем данные о заказе
                    Order::updateOrderById($id, $options);

                    // Перенаправляем
                    header('Location: /admin/order/view/' . $id);
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_order/update.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница удаления заказа
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Удаляем
        Order::deleteOrderById($id);
        return true;
    }

}