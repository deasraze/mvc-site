<?php

/**
 * Class CartController
 * Корзина
 */
class CartController
{

    public function actionIndex()
    {
        // Получаем фото пользователя по id
        $idUser = User::checkLogged();

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

    public function actionAdd($id)
    {
        // Добавляем в корзину и выводим результат (кол-во билетов в корзине)
        echo Cart::addTicket($id);
        return true;

    }

    public function actionDelete($id)
    {
        // Удаляем билет из корзины
        Cart::deleteTicket($id);

        // Возвразаем пользователя в корзину
        header("Location: /cart/");
    }

    public function actionCheckout()
    {
        // Статус оформления заказа
        $result = false;

        // Если форма отправлена
        if (isset($_POST['submit'])) {
            // Считываем данные с формы
            $userName = $_POST['userName'];
            $userSurname = $_POST['userSurname'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // Валидация полей
            $errors = false;
            if (!User::checkName($userName) || !User::checkName($userSurname))
                $errors[] = 'Неправильное имя или фамилия';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            // Если форма заполнена правильно
            if ($errors == false) {
                // Сохраняем заказ в бд

                // Получаем инф-ю о заказе
                $ticketsInCart = Cart::getTickets(); // Получаем билеты из корзины (сессии)
                // Проверяем, является ли пользователь гостем
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged(); // Если авторизован, запоминаем id
                }

                // Сохраняем заказ в БД
                $result = Order::save($userName, $userSurname, $userPhone, $userComment, $userId, $ticketsInCart);

                if ($result) {
                    // Отправляем письмо на почту администратора
                    $adminEmail = 'museum@museum.ru';
                    $subject = 'Новый заказ';
                    $message = 'http://mvc-site/admin/orders';
                    mail($adminEmail, $subject, $message);

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