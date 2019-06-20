<?php

/**
 * Контроллер AdminController
 */

class AdminController extends AdminBase
{

    /**
     * Action для главной страницы админ панели
     * @return bool
     */
    public function actionIndex()
    {
        // Проверка доступа
        if (self::checkAdmin() || self::checkEditor()) {
            // Получаем id пользователя
            $idUser = User::checkLoggedAdminPanel();

            // Подключаем вид
            require_once (ROOT . '/views/admin/index.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Страница авторизации в админ панель
     * @return bool
     */
    public function actionLogin()
    {
        if (User::checkLoggedAdminPanelNoRedirect()) {
            // Если пользователь уже авторизован в админ панели, перенаправляем
            header("Location: /admin/");

        } else {
            // Получаем id пользователя
            $userId = User::getUserId();

            if (User::checkRole($userId)) {
                // Если у пользователя роль админ или редактор, то продолжаем

                $login = '';
                $password = '';

                if (isset($_POST['submit'])) {
                    // Считываем данные с формы
                    $login = $_POST['login'];
                    $password = $_POST['password'];

                    $errors = false;

                    // Проверяем данные для входа
                    $getUserId = User::checkUserDataAdminPanel($login, $password);

                    if ($userId != $getUserId) {
                        // Если id пользователя не равно id пользователя, чьи данные были введены
                        // Выводим ошибку
                        $errors[] = 'Неправильный логин или пароль';
                    } elseif ($getUserId == false) {
                        // Если данные не верны, выводим ошибку
                        $errors[] = 'Неправильный логин или пароль';
                    } else {
                        // Если данные правильные, то запоминаем пользователя
                        User::authAdminPanel($getUserId);

                        // Перенаправляем в админ панель
                        header('Location: /admin/');
                    }
                }

                // Подключаем вид
                require_once (ROOT . '/views/admin/login.php');
                return true;

            } else {

                header('Location: /');
                return false;
            }
        }

        return false;
    }

    /**
     * Страница с настройками сайта
     * @return bool
     */
    public function actionSettings()
    {
        // Проверка прав доступа
        if (self::checkAdmin()) {
            // Получаем id для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем массив с настройками
            $settings = SiteConfig::getSiteSettings();

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, считываем данные
                $options['site_title'] = $_POST['site_title'];
                $options['site_description'] = $_POST['site_description'];
                $options['admin_email'] = $_POST['admin_email'];
                $options['collection_count'] = $_POST['collection_count'];
                $options['news_count'] = $_POST['news_count'];
                $options['tickets_count'] = $_POST['tickets_count'];

                // Сохраняем изменения
                SiteConfig::updateSiteSettings($options);

                // Перенаправляем
                header("Location: /admin/");
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin/settings.php');
            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }

    /**
     * Выход из админ панели
     */
    public function actionLogout()
    {
        // Удаляем данные из сесси и перенаправляем
        unset($_SESSION['admin_user']);
        header("Location: /");
    }

    /**
     * Страница поиска в админ панели
     * @return bool
     */
    public function actionSearch()
    {
        // Проверяем права доступа
        if (self::checkAdmin() || self::checkEditor()) {

            if (isset($_POST['query'])) {
                // Если запрос был отправлен, считываем с какой страницы был запрос и определяем метод для поиска
                $url = $_SERVER['HTTP_REFERER'];

                if (strpos($url, 'collection') !== false) {
                    $query = $_POST['query'];
                    Collection::searchCollectionInAdminPanel($query);

                } elseif (strpos($url, 'user') !== false) {
                    $query = $_POST['query'];
                    User::searchUserInAdminPanel($query);

                } elseif (strpos($url, 'order') !== false) {
                    $query = $_POST['query'];
                    Order::searchOrderInAdminPanel($query);

                } elseif (strpos($url, 'ticket') !== false) {
                    $query = $_POST['query'];
                    Tickets::searchTicketInAdminPanel($query);

                } elseif (strpos($url, 'category') !== false) {
                    $query = $_POST['query'];
                    Category::searchCategoryInAdminPanel($query);

                } elseif (strpos($url, 'jobs') !== false) {
                    $query = $_POST['query'];
                    Jobs::searchJobInAdminPanel($query);
                } elseif (strpos($url, 'news') !== false) {
                    $query = $_POST['query'];
                    News::searchNewsInAdminPanel($query);
                }
            }

            return true;
        }

        die(require_once (ROOT . '/views/404/404.html'));
    }
}