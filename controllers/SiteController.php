<?php

class SiteController
{

    public function actionIndex()
    {
        $idUser = User::getUserId();
        
        require_once(ROOT.'/views/site/index.php');

        return true;
    }

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
                $adminEmail = 'museum@museum.ru';
                $subject =  $userTheme;
                $message = "Текст: {$userText}." . PHP_EOL . "От {$userEmail}";
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');

        return true;
    }


    public function actionError()
    {
        echo '404 - не найдено';
        return true;
    }
}