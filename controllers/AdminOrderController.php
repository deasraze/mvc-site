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
    public function actionIndex()
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Получаем список заказов
        $ordersList = Order::getOrdersListByAdmin();

        // Подключаем вид
        require_once (ROOT . '/views/admin_order/index.php');
        return true;
    }

    /**
     * Страница с просмотром заказа
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

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

    /**
     * Страница обновления заказа
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        // Получаем информацию о заказе
        $order = Order::getOrderById($id);

        // Проверяем отправку формы
        if (isset($_POST['submit'])) {
            // Если форма была отправлена, считываем данные
            $options['user_name'] = $_POST['user_name'];
            $options['user_surname'] = $_POST['user_surname'];
            $options['user_phone'] = $_POST['user_phone'];
            $options['user_comment'] = $_POST['user_comment'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            // При желании можно доделать валидацию
            $errors = false;
            if (!isset($options['user_name']) || empty($options['user_name'])) {
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

    /**
     * Страница удаления заказа
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверяем права доступа
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            // Если форма была отправлена, то удаляем
            Order::deleteOrderById($id);

            // Перенаправляем
            header('Location: /admin/order');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_order/delete.php');
        return true;
    }

}