<?php

/**
 * Контроллер для управления главной страницей сайта
 * Контроллер SiteController
 */

class SiteController
{

    /**
     * Главная страница
     * @return bool
     */
    public function actionIndex()
    {
        // Получаем id пользователя для авы
        $idUser = User::getUserId();

        // Получаем настройки сайта
        $settings = SiteConfig::getSiteSettings();

        // Подключаем вид
        require_once(ROOT.'/views/site/index.php');
        return true;
    }

    /**
     * Страница обратной связи
     * @return bool
     */
    public function actionContact()
    {
        // Получаем фото пользователя по id
        $idUser = User::getUserId();

        $userEmail = '';
        $userText = '';
        $userTheme = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $userTheme = $_POST['userTheme'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($userText == null ) {
                $errors[] = 'Введите сообщение';
            }

            if ($userTheme == null ) {
                $errors[] = 'Введите тему';
            }

            if ($errors == false) {
                $adminEmail = SiteConfig::getSiteSettings();
                $subject =  $userTheme;
                $message = "Текст: {$userText}." . PHP_EOL . "От {$userEmail}";

                $result = mail($adminEmail['admin_email'], $subject, $message);
                $result = true;
            }
        }

        /**
         * Подключаем вид
         */
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }


    /**
     * Вывод ошибки, ели страница не найдена
     * @return bool
     */
    public function actionError()
    {
        require_once (ROOT . '/views/404/404.html');
        return true;
    }
}