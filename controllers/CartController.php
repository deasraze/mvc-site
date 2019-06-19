<?php

/**
 * Class CartController
 * Корзина
 */

class CartController
{

    /**
     * Главная страница корзины
     * @return bool
     */
    public function actionIndex()
    {
        // Получаем фото пользователя по id
        $idUser = User::getUserId();

        $ticketsInCart = false;

        // Получаем данные из корзины (сессии)
        $ticketsInCart = Cart::getTickets();

        // Если билеты в корзине есть
        if ($ticketsInCart) {
            // Получаем полную информацию о билетах для списка
            // array_keys возвращает массив только с id билетов
            $ticketsIds = array_keys($ticketsInCart);

            // Получаем массив с полной инф. о билетах
            $tickets = Tickets::getTicketsByIds($ticketsIds);

            // Получаем общую стоимость
            $totalPrice = Cart::getTotalPrice($tickets);
        }

        require_once (ROOT . '/views/cart/index.php');
        return true;
    }

    /**
     * Добавление билета
     * @param $id
     * @return bool
     */
    public function actionAdd($id)
    {
        // Добавляем в корзину и выводим результат (кол-во билетов в корзине)
        echo Cart::addTicket($id);
        return true;

    }

    /**
     * Удаление билета
     * @param $id
     */
    public function actionDelete($id)
    {
        // Удаляем билет из корзины
        Cart::deleteTicket($id);
    }

    /**
     * Удаление билета поштучно
     * @param $id
     */
    public function actionDelamount($id)
    {
        // Удаляем 1 шт одного билета, если их несколько
        Cart::deleteAmountTicket($id);
    }

    /**
     * Страница оформления заказа
     * @return bool
     */
    public function actionCheckout()
    {
        // Получаем фото пользователя по id
        $idUser = User::getUserId();
        
        // Статус оформления заказа
        $result = false;

        // Если форма отправлена
        if (isset($_POST['submit'])) {
            // Считываем данные с формы
            $userName = $_POST['userName'];
            $userSurname = $_POST['userSurname'];
            $userPatronymic = $_POST['userPatronymic'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $userName = SiteConfig::html($userName, false);
            $userSurname = SiteConfig::html($userSurname, false);
            $userPatronymic = SiteConfig::html($userPatronymic, false);
            $userComment = SiteConfig::html($userComment, false);

            // Валидация полей
            $errors = false;

            if (!User::checkName($userName) || !User::checkName($userSurname) || !User::checkName($userPatronymic))
                $errors[] = 'Неправильное имя, фамилия или отчество';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            // Если форма заполнена правильно
            if ($errors == false) {
                // Сохраняем заказ в бд

                // Получаем инф-ю о заказе
                $ticketsInCart = Cart::getTickets(); // Получаем билеты из корзины (сессии)
                $ticketsIds = array_keys($ticketsInCart); // Получаем только id билетов из корзины
                $tickets = Tickets::getTicketsByIds($ticketsIds); // Получаем полную инф-ю билетов по id
                $totalPrice = Cart::getTotalPrice($tickets); // Считаем итоговую стоимость

                // Проверяем, является ли пользователь гостем
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged(); // Если авторизован, запоминаем id
                }

                // Сохраняем заказ в БД
                $result = Order::save($userName, $userSurname, $userPatronymic, $userPhone, $userComment, $userId, $totalPrice, $ticketsInCart);

                if ($result) {
                    // Отправляем письмо на почту администратора
                    $adminEmail = SiteConfig::getSiteSettings();
                    $subject = 'Новый заказ';
                    $message = 'http://'.$_SERVER['HTTP_HOST'] . '/admin/order/';
                    mail($adminEmail['admin_email'], $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
            } else {
                // Если форма заполнена неправильно

                // Итоги
                $ticketsInCart = Cart::getTickets(); // Получаем билеты из корзины (сессии)
                $ticketsIds = array_keys($ticketsInCart); // Получаем только id билетов из корзины
                $tickets = Tickets::getTicketsByIds($ticketsIds); // Получаем полную инф-ю билетов по id
                $totalPrice = Cart::getTotalPrice($tickets); // Считаем итоговую стоимость
                $totalQuantity = Cart::countItems(); // Считаем кол-во товаров в корзине
            }
        } else {
            // Если форма не отправлена

            // Получаем билеты из корзины (сессии)
            $ticketsInCart = Cart::getTickets();

            // Если в корзине нет билетов
            if ($ticketsInCart == false) {
                header("Location: /tickets/"); // Отправляем пользователя на страницу с билетами
            } else {
                // Если в корзине есть билеты

                // Итоги
                $ticketsIds = array_keys($ticketsInCart); // Получаем только id билетов из корзины
                $tickets = Tickets::getTicketsByIds($ticketsIds); // Получаем полную инф-ю билетов по id
                $totalPrice = Cart::getTotalPrice($tickets); // Считаем итоговую стоимость
                $totalQuantity = Cart::countItems(); // Считаем кол-во товаров в корзине

                $userName = false;
                $userSurname = false;
                $userPatronymic = false;
                $userPhone = false;
                $userComment = false;

                // Если пользователь гость
                if (User::isGuest()) {
                    // Значения для формы пустые
                } else {
                    // Авторизован
                    $userId = User::checkLogged(); // Получаем id юзера из сессии
                    $user = User::getUserById($userId); // Получаем информацию о пользователе по id из БД
                    $userName = $user['name'];
                    $userSurname = $user['surname'];
                }
            }
        }

        require_once (ROOT . '/views/cart/checkout.php');
        return true;
    }
}